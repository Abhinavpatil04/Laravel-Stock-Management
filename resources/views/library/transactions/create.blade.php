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
                <div id="select_asset"><select class="form-control select2 {{ $errors->has('asset_name') ? 'is-invalid' : '' }}" name="asset_name" id="asset_name" onchange="setrfid(event);">
                    @foreach($assets as $id => $asset)
                        <option value="{{ $id }}" {{ old('asset_name') == $id ? 'select' : '' }}>{{ $asset }}</option>
                    @endforeach
                </select></div>
                <textarea class="form-control {{ $errors->has('asset_name') ? 'is-invalid' : '' }}" name="asset_name" id="asset_name_text" style="display: none; background-color: white; color: black;"></textarea>
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
                <div id="select_user"><select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" onchange="setmember(event);" id="user_id"   required>
                    @foreach($users as $id => $user)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $user }}</option>
                    @endforeach
                </select></div>
                <textarea class="form-control {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id_text" style="display: none; background-color: white; color: black;"></textarea>
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
               
                getBookDetails(this.value);
            }else {
                document.getElementById('asset_name_text').style.display = 'none';
                document.getElementById('asset_name_text').disabled = true;
                document.getElementById('select_asset').style.display = 'block';
            }
        }
        function getBookDetails(val) {
            const div =  document.getElementById('asset_name_text');
            $.ajax({
                url:'http://127.0.0.1:8000/library/transactions/getBookDetails/'+val,
                type:'get',
                dataType:'json',
                success:function(response) {
                    if(response['data']!= null){
                        const name = response['data'][0].name;
                        const author = response['data'][0].author;
                        const publication = response['data'][0].publication;
                        const edition = response['data'][0].edition;
                        const language = response['data'][0].language;
                        const cost = response['data'][0].cost;
                        var options = document.getElementById("asset_name").options;
                        for (var i = 0; i < options.length; i++) {
                        if (options[i].text == name) {
                            options[i].selected = true;
                            break;
                         }
                        }
                        div.innerHTML = "\nAuthor: "+ author + "\nPublication: "+ publication +"\nEdition: "+ edition+ "\nLanguage: "+ language+ "\nCost: "+ cost;
                       // div.innerHTML = "<strong>Name: </strong>" + name + "<br><strong> Author: </strong>" + author + "<br><strong> Publication: </strong>" + publication + "<br><strong> Edition: </strong>" + edition;
                    }
                }
            })

        }
        document.getElementById('member_id').onkeyup = function(){
            if((this.value).length === 10){
                document.getElementById('user_id_text').style.display = 'block';
                document.getElementById('user_id_text').disabled = true;
                
                getmemberDetails(this.value);
            }else {
                document.getElementById('user_id_text').style.display = 'none';
                document.getElementById('user_id_text').disabled = true;
                document.getElementById('select_user').style.display = 'block';
            }
        }
        function getmemberDetails(val) {
            const div =  document.getElementById('user_id_text');
            $.ajax({
                url:'http://127.0.0.1:8000/library/transactions/getmemberDetails/'+val,
                type:'get',
                dataType:'json',
                success:function(response) {
                    if(response['data']!= null){
                        const id = response['data'][0].id;
                        const fname = response['data'][0].fname;
                        const lname = response['data'][0].lname;
                        const email = response['data'][0].email;
                        const mobile = response['data'][0].mobile;
                        var options = document.getElementById("user_id").options;
                        for (var i = 0; i < options.length; i++) {
                        if (options[i].text == mobile) {
                            options[i].selected = true;
                            break;
                         }
                        }
                        div.innerHTML = "ID:"+id+"\nFirstname: "+ fname + "\nlastname: "+ lname +"\nEmail: "+ email+ "\nmobile: "+ mobile;
                       // div.innerHTML = "<strong>Name: </strong>" + name + "<br><strong> Author: </strong>" + author + "<br><strong> Publication: </strong>" + publication + "<br><strong> Edition: </strong>" + edition;
                    }
                }
            })

        }

        
        function setrfid(e) {
            let bookid =parseInt(e.target.value);  // Double quotes
           
            $.ajax({
                url:'http://127.0.0.1:8000/library/transactions/getRfidTag/'+bookid,
                type:'get',
                dataType:'json',
                success:function(response) {
                    if(response['data']!= null){
                        const rfid_tag = response['data'][0].rfid_tag;
                         document.getElementById("asset_id").value = rfid_tag;
                    }
                }
            })

        }

        function setmember(e){
            let memberid =parseInt(e.target.value);  // Double quotes
            $.ajax({
                url:'http://127.0.0.1:8000/library/transactions/getmember/'+memberid,
                type:'get',
                dataType:'json',
                success:function(response) {
                    if(response['data']!= null){
                        console.log(response);
                        const rfid_tag = response['data'][0].rfid_tag;
                        document.getElementById("member_id").value = rfid_tag;
                    }
                }
            })
        }
    </script>


@endsection
