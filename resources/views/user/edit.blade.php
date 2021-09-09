@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    Edit User
                </div>
                {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch', 'enctype'=>"multipart/form-data"]) !!}
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
