@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                Name: {{ $state->name }} <br>
                Created At: {{ $state->created_at->diffForHumans() }}
            </div>
        </div>
    </div>
@endsection
