<?php

namespace App\Http\Controllers\Library;

use App\Models\Asset;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetRequest;
use App\Http\Requests\StoreAssetRequest;
use App\Http\Requests\UpdateAssetRequest;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AssetsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = Auth::user();
        $assets = Asset::all()->where('team_id',$user->team_id);

        return view('library.assets.index', compact('assets'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('library.assets.create');
    }

    public function store(StoreAssetRequest $request)
    {
        $asset = Asset::create($request->all());

        return redirect()->route('library.assets.index');

    }

    public function edit(Asset $asset)
    {
        abort_if(Gate::denies('asset_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('library.assets.edit', compact('asset'));
    }

    public function update(UpdateAssetRequest $request, Asset $asset)
    {
        $asset->update($request->all());

        return redirect()->route('library.assets.index');

    }

    public function show(Asset $asset)
    {
        abort_if(Gate::denies('asset_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('library.assets.show', compact('asset'));
    }

    public function destroy(Asset $asset)
    {
        abort_if(Gate::denies('asset_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset->delete();

        return back();

    }

    public function massDestroy(MassDestroyAssetRequest $request)
    {
        Asset::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);

    }
}
