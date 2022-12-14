<?php

namespace App\Http\Controllers\Library;

use App\Models\Asset;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTransactionRequest;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\Stock;
use App\Models\Transaction;
use App\Models\User;
use Exception;
use Gate;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class TransactionsController
 * @package App\Http\Controllers\Library
 */
class TransactionsController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        abort_if(Gate::denies('transaction_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transactions = Transaction::all();

        return view('library.transactions.index', compact('transactions'));
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        abort_if(Gate::denies('transaction_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $users = User::all()->pluck('mobile', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('library.transactions.create', compact('assets', 'users'));
    }

    

    /**
     * @param StoreTransactionRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTransactionRequest $request)
    {
        $Asset = Asset::where('rfid_tag',$request->input('asset_id'))->get();
        $member = User::where('rfid_tag',$request->input('member_id'))->get();
        $issuedate = date("Y-m-d");
        $returndate = date('Y-m-d', strtotime($issuedate. ' + 7 days'));  
        $transaction = Transaction::create(array_merge($request->all(), ['member_id' => $member[0]->id,'asset_id' => $Asset[0]->id,'returnDate' => $returndate,'issueDate' => $issuedate]));
        return redirect()->route('library.transactions.index');

    }

    /**
     * @param Transaction $transaction
     * @return Factory|View
     */
    public function edit(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assets = Asset::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transaction->load('asset', 'team', 'user');

        return view('library.transactions.edit', compact('assets', 'users', 'transaction'));
    }

    /**
     * @param UpdateTransactionRequest $request
     * @param Transaction $transaction
     * @return RedirectResponse
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->all());

        return redirect()->route('library.transactions.index');

    }

    /**
     * @param Transaction $transaction
     * @return Factory|View
     */
    public function show(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->load('asset', 'team', 'user');

        return view('library.transactions.show', compact('transaction'));
    }

    /**
     * @param Transaction $transaction
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Transaction $transaction)
    {
        abort_if(Gate::denies('transaction_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $transaction->delete();

        return back();

    }

    /**
     * @param MassDestroyTransactionRequest $request
     * @return ResponseFactory|\Illuminate\Http\Response
     */
    public function massDestroy(MassDestroyTransactionRequest $request)
    {
        Transaction::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }

    /**
     * @param Stock $stock
     * @return RedirectResponse
     */
    public function storeStock(Stock $stock)
    {
        $action      = request()->input('action', 'add') == 'add' ? 'add' : 'remove';
        $stockAmount = request()->input('stock', 1);
        $sign        = $action == 'add' ? '+' : '-';

        if ($stockAmount < 1) {
            return redirect()->route('library.stocks.index')->with([
                'error' => 'No item was added/removed. Amount must be greater than 1.',
            ]);
        }
         
        
        Transaction::create([
            'stock'    => $sign . $stockAmount,
            'asset_id' => $stock->asset->id,
            'team_id'  => $stock->team->id,
            'user_id'  => auth()->user()->id,

        ]);

        if ($action == 'add') {
            $stock->increment('current_stock', $stockAmount);
            $status = $stockAmount . ' item(-s) was added to stock.';
        }

        if ($action == 'remove') {
            if ($stock->current_stock - $stockAmount < 0) {
                return redirect()->route('library.stocks.index')->with([
                    'error' => 'Not enough items in stock.',
                ]);
            }

            $stock->decrement('current_stock', $stockAmount);
            $status = $stockAmount . ' item(-s) was removed from stock.';
        }

        return redirect()->route('library.stocks.index')->with([
            'status' => $status,
        ]);
    }
}
