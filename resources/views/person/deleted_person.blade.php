@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h1 class="bold">Deleted Person Lists</h1>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>S.N</td>
                                <td>Name</td>
                                <td>Address</td>
                                <td>Email</td>
                                <td>Image</td>
                                <td>Deleted At</td>

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
                                            <img src="{{ asset('images/person/' . $person->image) }}" alt="" width="100px"
                                                height="100px">
                                        @else

                                            <h4>No Image</h4>
                                    </td>
                            @endif
                            <td>{{ $person->deleted_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
