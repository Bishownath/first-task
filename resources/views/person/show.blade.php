@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5 ml-1">
            <div class="card">
                <div class="card-body">
                    <p>Name: {{ $person->name }}</p>
                    <p>Age: {{ $person->age }}</p>
                    <p>Gender: {{ $person->gender }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Another Section for the Show Page</p>
                </div>
            </div>
        </div>
    </div>
@endsection
