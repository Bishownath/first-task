@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Municipality Show Page</h3>
                </div>
                <td>{{ $municipality->name }}</td>
                <td>{{ $municipality->state_id }}</td>
                <td>{{ $municipality->created_at->diffForHumans() }}</td>
            </div>
        </div>
    </div>
@endsection