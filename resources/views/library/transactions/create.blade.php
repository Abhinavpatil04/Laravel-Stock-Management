@extends('layouts.library')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("library.transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row align-content-lg-center justify-content-center">
            <div class="form-group col-6">
                <label class="required" for="asset_id">{{ trans('cruds.transaction.fields.book_tag') }}</label>
                <input class="form-control {{ $errors->has('asset') ? 'is-invalid' : '' }}" name="asset_id" id="asset_id" required maxlength="10">
                @if($errors->has('asset'))
                    <div class="invalid-feedback">
                        {{ $errors->first('asset') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.asset_helper') }}</span>
            </div>
            <div class="form-group col-6">
                <label for="asset_name">{{ trans('cruds.transaction.fields.asset') }}</label>
                <input class="form-control {{ $errors->has('asset_name') ? 'is-invalid' : '' }}" name="asset_name" id="asset_name_text" style="display: none;">
                <div id="select_asset"><select class="form-control select2 {{ $errors->has('asset_name') ? 'is-invalid' : '' }}" name="asset_name" id="asset_name">
                    @foreach($assets as $id => $asset)
                        <option value="{{ $id }}" {{ old('asset_name') == $id ? 'select' : '' }}>{{ $asset }}</option>
                    @endforeach
                </select></div>
                @if($errors->has('asset_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('asset_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.asset_helper') }}</span>
            </div>
                <div class="form-group col-6">
                    <label class="required" for="asset_id">{{ trans('cruds.transaction.fields.member_tag') }}</label>
                    <input class="form-control {{ $errors->has('member') ? 'is-invalid' : '' }}" name="member_id" id="member_id" required maxlength="10">
                    @if($errors->has('member'))
                        <div class="invalid-feedback">
                            {{ $errors->first('member') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.transaction.fields.asset_helper') }}</span>
                </div>
            <div class="form-group col-6">
                <label for="user_id">{{ trans('cruds.transaction.fields.member') }}</label>
                <input class="form-control {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id_text" style="display: none;">
                <div id="select_user"><select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select></div>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.user_helper') }}</span>
            </div>

            <div class="form-group col-2 ">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">

        document.getElementById('asset_id').onkeyup = function(){
            if((this.value).length === 10){
                document.getElementById('asset_name_text').style.display = 'block';
                document.getElementById('asset_name_text').disabled = true;
                document.getElementById('select_asset').style.display = 'none';
            }else {
                document.getElementById('asset_name_text').style.display = 'none';
                document.getElementById('asset_name_text').disabled = true;
                document.getElementById('select_asset').style.display = 'block';
            }
        }
        document.getElementById('member_id').onkeyup = function(){
            if((this.value).length === 10){
                document.getElementById('user_id_text').style.display = 'block';
                document.getElementById('user_id_text').disabled = true;
                document.getElementById('select_user').style.display = 'none';
            }else {
                document.getElementById('user_id_text').style.display = 'none';
                document.getElementById('user_id_text').disabled = true;
                document.getElementById('select_user').style.display = 'block';
            }
        }


    </script>


@endsection