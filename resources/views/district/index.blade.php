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
                @if ($district->count())
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>S.N</td>
                                <td>Name</td>
                                <td>Slug</td>
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
                                    <td>{{ $d->slug }}</td>
                                    <td>{{ $d->state->name }}</td>
                                    <td>{{ $d->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if (auth()->user()->check_role == 'admin')

                                            <a href="{{ route('district.show', $d->id) }}" class="btn btn-info"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('district.edit', $d->id) }}" class="btn btn-success"><i
                                                    class="fa fa-pen"></i></a>
                                            <form action="{{ route('district.destroy', $d->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                            </form>

                                        @else
                                            <a href="{{ route('district.show', $d->id) }}" class="btn btn-info"><i
                                                    class="fa fa-eye"></i></a>
                                            <a href="{{ route('district.edit', $d->id) }}" class="btn btn-success"><i
                                                    class="fa fa-pen"></i></a>
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h3 class="text-danger text-center">THERE IS NO DATA !!</h3>
                @endif
            </div>
        </div>
    </div>


@endsection
