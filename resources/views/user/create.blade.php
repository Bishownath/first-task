@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card mx-5">
                {!! Form::open(['route' => ['user.store'], 'method' => 'post']) !!}
                @include('user.common.form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
