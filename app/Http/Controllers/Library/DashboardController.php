<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Transaction;
use App\Models\User;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dashboard_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->where('team_id', Auth::user()->team_id)->where('role','!=','member')->count();
        $asset = Asset::all()->where('team_id', Auth::user()->team_id)->count();
        $transaction = Transaction::all()->where('team_id', Auth::user()->team_id)->count();
        $member = User::all()->where('team_id', Auth::user()->team_id)->where('role','member')->count();

        return view('library.dashboard.index', compact('users', 'asset', 'transaction', 'member'));
    }
}
