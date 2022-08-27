@extends('layouts.library')
@section('content')
    <div class="row">
        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
            <div class="card-header">Total Active Users</div>
            <div class="card-body">
                <h1 class="card-title">{{ $users }}</h1>
            </div>
        </div>
    </div>
@endsection
