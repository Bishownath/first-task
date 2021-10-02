@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="{{ route('municipality.create') }}" class="btn btn-success float-right mb-2">
                Add Municipality
            </a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card text-center">
                <div class="card-header">
                    <h1 class="bold">Municipality List</h1>
                </div>
                @if ($municipalities->count())
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>S.N</td>
                                    <td>State</td>
                                    <td>District</td>
                                    <td>Name</td>
                                    <td>Ward Number</td>
                                    <td>Created At</td>
                                    <td>Action</td>
                                    <td></td>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($municipalities as $key => $municipality)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $municipality->district->state->name }}</td>
                                        <td>{{ $municipality->district->name }}</td>
                                        <td>{{ $municipality->name }}</td>
                                        <td>{{ $municipality->ward_number }}</td>
                                        <td>{{ $municipality->created_at->diffForHumans() }}</td>
                                        <td>

                                            <a href="{{ route('municipality.show', $municipality->id) }}" class="btn btn-info"><i
                                                    class="fa fa-eye"></i></a>

                                            @can('isAdmin')
                                                <a href="{{ route('municipality.edit', $municipality->id) }}" class="btn btn-success"><i
                                                        class="fa fa-pen"></i></a>
                                                <form action="{{ route('municipality.destroy', $municipality->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                                </form>
                                            @endcan


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <h3 class="text-center text-danger">THERE IS NO DATA !!</h3>
                @endif

            </div>
        </div>
    </div>
@endsection
