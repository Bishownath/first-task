@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {!! Form::model($state, ['route' => ['state.update', $state->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}
                @csrf
                @include('state.common.form')

                <div class="justify-content-center d-flex">
                    <button class="btn btn-success"><i class="fa fa-check">Submit</i></button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
