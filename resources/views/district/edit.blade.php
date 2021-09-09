@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {!! Form::model($district, ['route'=>['district.update', $district->id],'method'=>'put', 'enctype'=>'multipart/form-data'])   !!}
                @csrf
                @include('district.common.form')

                <div class="row justify-content-center d-flex">
                    <button class="btn btn-success"><i class="fa fa-check">Update</i></button>
                </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </div>
@endsection
