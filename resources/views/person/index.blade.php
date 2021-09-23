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
                <div class="header text-center">
                    <h2>Person Lists</h2>
                </div>
                @if ($person->count())

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>S.N</td>
                                <td>Name</td>
                                <td>Slug</td>
                                <td>Address</td>
                                <td>Email</td>
                                <td>State</td>
                                <td>District</td>
                                <td>Municipality</td>
                                <td>Citizenship No</td>
                                <td>Image</td>
                                <td>Created At</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($person as $key => $p)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->slug }}</td>
                                    <td>{{ $p->address }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ $p->state->name }}</td>
                                    <td>{{ $p->district->name }}</td>
                                    <td>{{ $p->municipality->name }}</td>
                                    <td>{{ $p->citizenship_number }}</td>
                                    <td>
                                        @if ($p->image)
                                            <img src="{{ asset('images/person/' . $p->image) }}" alt="" width="100px"
                                                height="100px">
                                        @else

                                            <h4>No Image</h4>
                                    </td>
                            @endif
                            <td>{{ $p->created_at->diffForHumans() }}</td>
                            <td>

                                <a href="{{ route('person.edit', $p->id) }}" class="btn btn-success"><i
                                        class="fa fa-pen"></i></a>



                                <a href="{{ route('person.show', $p->id) }}" class="btn btn-info"><i
                                        class="fa fa-eye"></i></a>

                                @can('isAdmin')
                                    <form action="{{ route('person.destroy', $p->id) }}" method="post">
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
            @else
                <h4 class="text-danger text-center">There is no DATA !!</h4>
                @endif

            </div>
        </div>
    </div>
@endsection
