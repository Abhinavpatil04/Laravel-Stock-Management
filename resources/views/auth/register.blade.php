@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
<div class="col-md-8">

           <div class="card">
                <div class="card-header">
                <div class="button-box">
                    <div id="btnreg"></div>
        <button type='button' id="btnstu" onclick="registerstudent(1) "  class='toggle-btn' style="margin-right:5px;background:#87CEEB;"><b   style="color:black; ">Register as Student</b></button>
        <button type='button' id="btnlibra" onclick="registerstudent(2)"   class='toggle-btn' ><b  style="color:black;">Register as Librarian</b></button>
</div>
            </div>

                <!--<div class="card-body" >-->
                   <div  class="card-body" >
                    <form id="register1"  style="display:block; "method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('Full Name *') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="first name" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth *') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number *') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="library" class="col-md-4 col-form-label text-md-right">{{ __('Library *') }}</label>


                            <div class="col-md-6">
                            <select class="select  form-control " name = "library" required>
                    <option value="0">select</option>
                    <option value="1">Library 1</option>
                    <option value="2">Library 2</option>
                    <option value="3">Library 3</option>
                    <option value="4">Library 4</option>
                    <option value="5">Library 5</option>
                    <option value="6">Library 6</option>
                  </select>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="rfid" class="col-md-4 col-form-label text-md-right">{{ __('RFID Tag (optional)') }}</label>

                            <div class="col-md-6">
                                <input id="rfid" type="number" class="form-control @error('') is-invalid @enderror" name="rfid" value="{{ old('') }}"  autocomplete="">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-right:5px; padding-right:15px; padding-left:15px;">
                                    {{ __('Register') }}
                                </button>
                                <button type="button" class="btn btn-primary" style="margin-left:5px; padding-right:15px; padding-left:15px;" onclick="window.location.href='{{route('login')}}'">
                                    {{ __('Back To Login') }}
                                </button>


                            </div>
</div>

                    </form>




                    <form  id="register2" style="display:none;" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="libraryname" class="col-md-4 col-form-label text-md-right">{{ __('Library Name *') }}</label>

                            <div class="col-md-6">
                                <input id="libraryname" type="text" class="form-control @error(' ') is-invalid @enderror" name="libraryname" value="{{ old('') }}" required autocomplete="library name" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address *') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error(' ') is-invalid @enderror" name="address" value="{{ old('') }}" required autocomplete="address" autofocus>

                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number *') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style=" margin-right:5px; padding-right:15px; padding-left:15px;">
                                    {{ __('Register') }}
                                </button>
                                <button type="button" class="btn btn-primary" style="margin-left:5px; padding-right:15px; padding-left:15px;" onclick="window.location.href='{{route('login')}}'">
                                    {{ __('Back To Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
</div>


            </div>
</div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    /* register button code */

 function registerstudent(a)
{
    if(a==1)
    {
        document.getElementById("btnstu").style.background="#87CEEB";
        document.getElementById("btnlibra").style.background="white";
        document.getElementById("register2").style.display="none";
        document.getElementById("register1").style.display="block";

}
    else
    {
        document.getElementById("btnlibra").style.background="#87CEEB";
        document.getElementById("btnstu").style.background="white";
        document.getElementById("register1").style.display="none";
        document.getElementById("register2").style.display="block";

    }
}

</script>


@endsection
