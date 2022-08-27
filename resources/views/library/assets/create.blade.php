@extends('layouts.library')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.asset.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("library.assets.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="form-group col-6">
                <label class="required" for="name">{{ trans('cruds.asset.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.name_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="author">{{ trans('cruds.asset.fields.author') }}</label>
                <input class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" type="text" name="author" id="author" value="{{ old('author', '') }}" required>
                @if($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.author_helper') }}</span>
            </div>
            </div>
            <div class="row">
            <div class="form-group col-6">
                <label class="required" for="publication">{{ trans('cruds.asset.fields.publication') }}</label>
                <input class="form-control {{ $errors->has('publication') ? 'is-invalid' : '' }}" type="text" name="publication" id="publication" value="{{ old('publication', '') }}" required>
                @if($errors->has('publication'))
                    <div class="invalid-feedback">
                        {{ $errors->first('publication') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.publication_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label class="required" for="edition">{{ trans('cruds.asset.fields.edition') }}</label>
                <input class="form-control {{ $errors->has('edition') ? 'is-invalid' : '' }}" type="text" name="edition" id="edition" value="{{ old('edition', '') }}" required>
                @if($errors->has('edition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('edition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.edition_helper') }}</span>
            </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label class="required" for="language">{{ trans('cruds.asset.fields.language') }}</label>
                    <select class="form-control {{ $errors->has('language') ? 'is-invalid' : '' }}" name="language" id="language" required>
                        <option value="English" selected>English</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Other">Other</option>
                    </select>
                    @if($errors->has('language'))
                        <div class="invalid-feedback">
                            {{ $errors->first('language') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.asset.fields.language_helper') }}</span>
                </div>
                <div class="form-group col-6">
                    <label class="required" for="pages">{{ trans('cruds.asset.fields.pages') }}</label>
                    <input class="form-control {{ $errors->has('pages') ? 'is-invalid' : '' }}" type="text" name="pages" id="pages" value="{{ old('pages', '') }}" required>
                    @if($errors->has('pages'))
                        <div class="invalid-feedback">
                            {{ $errors->first('pages') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.asset.fields.pages_helper') }}</span>
                </div>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.asset.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.asset.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="danger_level">{{ trans('cruds.asset.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('danger_level') ? 'is-invalid' : '' }}" type="number" name="danger_level" id="danger_level" value="{{ old('danger_level', 0) }}" required>
                @if($errors->has('danger_level'))
                    <div class="invalid-feedback">
                        {{ $errors->first('danger_level') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
