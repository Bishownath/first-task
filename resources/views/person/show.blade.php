@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-md-2">
            <div class="card id-image">
                <div class="card-body">
                    @if ($person->image)
                        {{-- <img src="{{ asset('images/person/'. $person->image) }}" alt="{{$person->image}}"> --}}
                        <img src="https://pixelphotocollage.com/assets/images/tom-cruse-2000x3000.jpg"
                            alt="{{ $person->image }}" width="100px" height="100px">
                    @else
                        <p>No Image Found</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <p>Name: {{ $person->name }}</p>
                    <p>Age: {{ $person->age }}</p>
                    <p>Email: {{ $person->email }}</p>
                    <p>Address: {{ $person->address }}</p>
                    <p>Gender: {{ $person->gender }}</p>
                    <p>Phone Number: {{ $person->phone_number }}</p>
                    <p>Mobile Number: {{ $person->mobile_number }}</p>
                    <p>Citizenship Number: {{ $person->citizenship_number }}</p>
                    @if ($person->passport_number)
                        <p>Passport Number: {{ $person->passport_number }}</p>
                    @endif
                    <p>Blood Group: {{ $person->blood_group }}</p>
                    <p>DOB: {{ $person->date_of_birth }}</p>
                    <p>Issue Date: {{ $person->issue_date }}</p>
                    <p>Validity Date: {{ $person->validity_date }}</p>
                    <p>Issue By: {{ $person->issued_by }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <p>Grandfather Name: {{ $person->family->grandfather_name }}</p>
                    <p>Father Name: {{ $person->family->father_name }}</p>
                    <p>Mother Name: {{ $person->family->mother_name }}</p>
                    <p>Grandmother Name: {{ $person->family->grandmother_name }}</p>
                    <p>Wife Name: {{ $person->family->wife_name }}</p>
                    <p>Son Name: @foreach ($person->children as $key => $item)
                            {{ $item->son_name }} ,
                        @endforeach
                    </p>
                    <p>Daughter Name: @foreach ($person->children as $key => $item)
                            {{ $item->daughter_name }},
                        @endforeach
                    </p>
                </div>
            </div>
        </div>
    </div>

    <style>
        main {
            background: ghostwhite;
        }

        .id-image {
            background: rgb(253, 244, 234);
            border-radius: 1em;

        }

    </style>
@endsection
