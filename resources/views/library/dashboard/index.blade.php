@extends('layouts.library')
@section('content')
    <div class="row">

    <div class="card  ml-3 mb-3 mr-3" style="display:flex; border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1); width: 31rem; background-color:blue; ">
    <div class="card-header"style=" background-color:blue;">Total Active Users<br>
                <h1 class="card-title" style="float:right;">{{ $users }}</h1>
</div>
<div class="card-body">
            <a href="{{ route("library.transactions.index") }}" style="color:white; text-decoration:none; font-size:15px;">View Cases</a>
</div>
        </div>

        <div class="card   ml-3 mb-3 mr-3" style="display:flex; border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1); width: 31rem;  background-color:purple;">
            <div class="card-header" style="background-color:purple;">Total Books<br>
                <h1 class="card-title" style="float:right;">{{ $users}}</h1>
            </div>
            <div class="card-body">
            <a href="{{ route("library.transactions.index") }}" style="color:white; text-decoration:none; font-size:15px;" >View Cases</a>
</div>
        </div>

        <div class="card   ml-3 mb-3 mr-3" style=" display:flex; border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1); width: 31rem;  background-color: #2BD47D;">
        <div class="card-header" style="background-color: #2BD47D;">Total Members<br>
                <h1 class="card-title" style="float:right;">{{ $users }}</h1>
            </div>
            <div class="card-body">
            <a href="{{ route("library.transactions.index") }}" style="color:white; text-decoration:none; font-size:15px;">View Cases</a>
</div>
        </div>

        <div class="card  ml-3 mb-3 mr-3" style=" display:flex; border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1); width: 31rem;  background-color:  orange;">
        <div class="card-header" style="background-color: orange;">Books Issued Out<br>
                <h1 class="card-title" style="float:right;">{{ $users }}</h1>
            </div>
            <div class="card-body">
            <a href="{{ route("library.transactions.index") }}"  style="color:white; text-decoration:none; font-size:15px;">View Cases</a>

</div>
        </div>

        <div class="card  ml-3 mb-3 mr-3" style=" display:flex; border-radius: 12px;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1); width: 31rem;  background-color:  red;">
        <div class="card-header" style="background-color: red;">Books Overdue<br>
                <h1 class="card-title" style="float:right;">{{ $users }}</h1>
            </div>
            <div class="card-body">
            <a href="{{ route("library.transactions.index") }}"  style="color:white; text-decoration:none; font-size:15px;">View Cases</a>

</div>
        </div>

    </div>
@endsection
