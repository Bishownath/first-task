@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {!! Form::open(['route' => ['state.store'], 'method' => 'post', 'enctype'=>"multipart/form-data"]) !!}
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