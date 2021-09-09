@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-10">
        <a href="{{ route('state.create') }}" class="float-right btn btn-success mb-2">
            Add State
        </a>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header text-center">
                <h1 class="bold">State Lists</h1>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>S.N.</td>
                            <td>Name</td>
                            <td>Created At</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($state as $key => $u)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $u->name }}</td>
                                <td>{{ $u->created_at->diffForHumans() }}</td>

                                <td>
                                    <a href="{{ route('state.show', $u->id) }}" class="btn btn-info"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ route('state.edit', $u->id) }}" class="btn btn-success"><i
                                            class="fa fa-pen"></i></a>
                                    <form action="{{ route('state.destroy', $u->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection