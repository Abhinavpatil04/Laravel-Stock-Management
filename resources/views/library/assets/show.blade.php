@extends('layouts.library')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asset.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('library.assets.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.name') }}
                        </th>
                        <td>
                            {{ $asset->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.author') }}
                        </th>
                        <td>
                            {{ $asset->author }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.publication') }}
                        </th>
                        <td>
                            {{ $asset->publication }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.edition') }}
                        </th>
                        <td>
                            {{ $asset->edition }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.language') }}
                        </th>
                        <td>
                            {{ $asset->language }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.pages') }}
                        </th>
                        <td>
                            {{ $asset->pages }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asset.fields.description') }}
                        </th>
                        <td>
                            {{ $asset->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Danger level
                        </th>
                        <td>
                            {{trans('global.inr')}} {{ $asset->cost }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
