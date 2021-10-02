@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="{{ route('district.create') }}" class="btn btn-success float-right mb-2">
                Add District
            </a>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header">
                    <h1 class="bold">District List</h1>
                </div>
                @if ($districts->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>S.N</td>
                                <td>State</td>
                                <td>Name</td>
                                <td>Created At</td>
                                <td>Action</td>
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($districts as $key => $district)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $district->state->name }}</td>
                                    <td>{{ $district->name }}</td>
                                    <td>{{ $district->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if (auth()->user()->check_role == 'admin')

                                            <a href="{{ route('district.show', $district->id) }}" class="btn btn-info"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('district.edit', $district->id) }}" class="btn btn-success"><i
                                                    class="fa fa-pen"></i></a>
                                            <form action="{{ route('district.destroy', $district->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>

                                        @else
                                            <a href="{{ route('district.show', $district->id) }}" class="btn btn-info"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('district.edit', $district->id) }}" class="btn btn-success"><i
                                                    class="fa fa-pen"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @else
                    <h3 class="text-danger text-center">THERE IS NO DATA !!</h3>
                @endif
            </div>
        </div>
    </div>


@endsection
