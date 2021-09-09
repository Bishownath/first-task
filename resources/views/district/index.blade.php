@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('district.create') }}" class="btn btn-success float-right mb-2">
                Add District
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">
                    <h3>District List</h3>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>S.N</td>
                            <td>Name</td>
                            <td>State</td>
                            <td>Created At</td>
                            <td>Action</td>
                            <td></td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($district as $key => $d)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $d->name }}</td>
                                <td>{{ $d->state->name }}</td>
                                <td>{{ $d->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{ route('district.show', $d->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
                                    <a href="{{ route('district.edit', $d->id) }}" class="btn btn-success"><i class="fa fa-pen"></i></a>
                                <form action="{{ route('district.destroy', $d->id) }}">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </form></td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
