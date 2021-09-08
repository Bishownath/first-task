@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mx-5">
                {!! Form::open(['route' => ['user.store'], 'method' => 'post']) !!}
                @csrf
                @include('user.common.form')

                <div class="mt-2 justify-content-center d-flex">
                    <button class="btn btn-success"><i class="fa fa-check">Submit</i></button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
