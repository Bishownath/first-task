@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    <h3>District Show Page</h3>
                </div>
                <td>{{ $district->name }}</td>
                <td>{{ $district->state_id }}</td>
                <td>{{ $district->created_at->diffForHumans() }}</td>
            </div>
        </div>
    </div>
@endsection