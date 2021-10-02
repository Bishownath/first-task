@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">

            <a href="{{ route('person.create') }}" class="btn btn-success float-right mb-2">
                Add Person
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="bold">Person Lists</h1>
                </div>
                @if ($persons->count())
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>S.N</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Email</td>
                                    <td>Image</td>
                                    <td>Created At</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($persons as $key => $person)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $person->name }}</td>
                                        <td>{{ $person->address }}</td>
                                        <td>{{ $person->email }}</td>
                                        <td>
                                            @if ($person->image)
                                                <img src="{{ asset('images/person/' . $person->image) }}" alt=""
                                                    width="100px" height="100px">
                                            @else

                                                <h4>No Image</h4>
                                        </td>
                                @endif
                                <td>{{ $person->created_at->diffForHumans() }}</td>
                                <td>
                                    <form action="{{ route('person.changeStatus', $person->id) }}" method="post">
                                        @csrf

                                        @if ($person->status)
                                            <a href="{{ route('person.changeStatus', $person->id) }}"
                                                class="btn btn-success">Active</a>
                                        @else
                                            <a href="{{ route('person.changeStatus', $person->id) }}"
                                                class="btn btn-info">Inactive</a>
                                        @endif
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('person.edit', $person->id) }}" class="btn btn-success"><i
                                            class="fa fa-pen"></i></a>



                                    <a href="{{ route('person.show', $person->id) }}" class="btn btn-info"><i
                                            class="fa fa-eye"></i></a>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <form action="{{ route('person.destroy', $person->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h4 class="text-center">Are you sure want to delete?</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    @can('isAdmin')
                                        <a href="javascript:void(0)" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal"><i class="fa fa-trash"></i></a>
                                    @endcan
                                </td>
                                </tr>
                @endforeach
                </tbody>
                </table>
            </div>
        @else
            <h4 class="text-danger text-center">There is no DATA !!</h4>
            @endif

        </div>
    </div>
    </div>
@endsection
