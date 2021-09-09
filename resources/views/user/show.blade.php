@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card ">
                <div class="card-header">
                    <h3>
                        User Details
                    </h3>
                </div>
                <strong>Name: {{ $user->name }}</strong>
                <strong>Email: {{ $user->email }}</strong>
                <strong>Created At: {{ $user->created_at->diffForHumans() }}</strong>
            </div>
        </div>
    </div>
@endsection