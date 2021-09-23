@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="m-5">
                    <form action="{{ route('person.update', $person->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Personal Information</p>
                                    </div>
                                    <div class="card-body">
                                        {{-- name --}}
                                        <div class="row">
                                            <div class="col-md-3">


                                                <div class="form-group">
                                                    <label for="name">Name</label>
                                                    <input type="text" name="name"
                                                        value="{{ old('name', $person->name) }}" class="form-control"
                                                        id="name" placeholder="Enter name">
                                                    @if ($errors->has('name'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('name') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            {{-- email --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="email">Email address</label>
                                                    <input type="text" name="email" class="form-control" id="email"
                                                        placeholder="Enter email"
                                                        value="{{ old('email', $person->email) }}">
                                                    @if ($errors->has('email'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            {{-- address --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="address">Address</label>
                                                    <input type="text" name="address" class="form-control" id="address"
                                                        placeholder="Enter address"
                                                        value="{{ old('address', $person->address) }}">
                                                    @if ($errors->has('address'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('address') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                            {{-- address line two --}}
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="address_two">Address Two</label>
                                                    <input type="text" name="address_two" class="form-control"
                                                        id="address_two"
                                                        value="{{ old('address_two', $person->address_two) }}"
                                                        placeholder="Enter address 2 optional">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">



                                                {{-- Contact Info --}}
                                                <div class="form-group">
                                                    <label for="phone_number">Phone Number</label>
                                                    <input type="tel" name="phone_number" class="form-control"
                                                        id="phone_number"
                                                        value="{{ old('phone_number', $person->phone_number) }}"
                                                        placeholder="Enter phone_number">
                                                    @if ($errors->has('phone_number'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('phone_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="mobile_number">Mobile Number</label>
                                                    <input type="tel" name="mobile_number"
                                                        value="{{ old('mobile_number', $person->mobile_number) }}"
                                                        class="form-control" id="mobile_number"
                                                        placeholder="Enter mobile_number">
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Age</label>
                                                    <input type="number" name="age"
                                                        value="{{ old('age', $person->age) }}" class="form-control"
                                                        id="" placeholder="Enter Age ">
                                                    @if ($errors->has('age'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('age') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">Gender</label>
                                                    <select name="gender" class="form-control">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>
                                                    @if ($errors->has('gender'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('gender') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Image</label>
                                                    <input type="file" name="image" class="form-control" id=""
                                                        placeholder="Enter ">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Existing Image</label><br>
                                                    @if ($person->image)
                                                        <img src="{{ asset('images/person/' . $person->image) }}" alt=""
                                                            height="50px" width="50px">
                                                    @else
                                                        <img src="" alt="No Image">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">Existing Multiple Image</label><br>
                                                    {{-- @if ($person->image)
                                                        <img src="{{ asset('images/person/' . $person->image) }}" alt=""
                                                            height="50px" width="50px">
                                                    @else
                                                        <img src="" alt="No Image">
                                                    @endif --}}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Personal ID Details</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Citizenship Number</label>
                                                    <input type="text" name="citizenship_number" class="form-control"
                                                        id=""
                                                        value="{{ old('citizenship_number', $person->citizenship_number) }}"
                                                        placeholder="Enter Citizenship Number">
                                                    @if ($errors->has('citizenship_number'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('citizenship_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Passport Number</label>
                                                    <input type="text" name="passport_number"
                                                        value="{{ old('passport_number', $person->passport_number) }}"
                                                        class="form-control" id="" placeholder="Enter Passport Number">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Date Of Birth</label>
                                            <input type="date" name="date_of_birth"
                                                value="{{ old('date_of_birth', $person->date_of_birth) }}"
                                                class="form-control" id="" placeholder="Enter DOB">
                                            @if ($errors->has('date_of_birth'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('date_of_birth') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="">Blood Group</label>
                                            <select name="blood_group" id="" class="form-control">
                                                <option value="" selected>Select Blood Group</option>
                                                <option value="o+" {{ $person->blood_group == 'o+' ? 'selected' : '' }}>
                                                    O+
                                                </option>
                                                <option value="ab-"
                                                    {{ $person->blood_group == 'ab-' ? 'selected' : '' }}>AB-
                                                </option>
                                                <option value="ab+"
                                                    {{ $person->blood_group == 'ab+' ? 'selected' : '' }}>AB+
                                                </option>
                                                <option value="o-" {{ $person->blood_group == 'o-' ? 'selected' : '' }}>
                                                    O-
                                                </option>
                                                <option value="b+" {{ $person->blood_group == 'b+' ? 'selected' : '' }}>
                                                    B+
                                                </option>
                                            </select>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Address Select</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="state_id">State</label>
                                            <select name="state_id" id="state_id" class="form-control">
                                                <option selected>Select State</option>
                                                @foreach ($state as $st)
                                                    <option value="{{ $st->id }}"
                                                        {{ $st->id == $person->state_id ? 'selected' : '' }}>
                                                        {{ $st->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="alert text-danger">{{ $errors->first('state_id') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="district_id">District</label>
                                            <select name="district_id" id="district_id" class="form-control">
                                                <option selected>Select District</option>
                                                @foreach ($district as $dist)
                                                    <option value="{{ $dist->id }}"
                                                        {{ $dist->id == $person->district_id ? 'selected' : '' }}>
                                                        {{ $dist->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('district_id'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('district_id') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="">Municipality</label>
                                            <select name="municipality_id" id="municipality_id" class="form-control">
                                                <option selected>Select Municipality</option>
                                                @foreach ($municipality as $mn)
                                                    <option value="{{ $mn->id }}"
                                                        {{ $mn->id == $person->municipality_id ? 'selected' : '' }}>
                                                        {{ $mn->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('municipality_id'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('municipality_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <p>Family Details</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Grandfather Name</label>
                                                    <input type="text" name="grandfather_name"
                                                        value="{{ old('grandfather_name', $person->grandfather_name) }}"
                                                        class="form-control" id="" placeholder="Enter Grandfather Name ">
                                                    @if ($errors->has('grandfather_name'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('grandfather_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Father Name</label>
                                                    <input type="text" name="father_name"
                                                        value="{{ old('father_name', $person->father_name) }}"
                                                        class="form-control" id="" placeholder="Enter Father Name">
                                                    @if ($errors->has('father_name'))
                                                        <span
                                                            class="alert text-danger">{{ $errors->first('father_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Grandmother Name</label>
                                                <input type="text" class="form-control" name="grandmother_name"
                                                    value="{{ old('grandmother_name', $person->family->grandmother_name) }}"
                                                    placeholder="Enter grandmother name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Mother Name</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('mother_name', $person->family->mother_name) }}"
                                                    name="mother_name" placeholder="Enter mother name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Wife Name</label>
                                                <input type="text" class="form-control"
                                                    value="{{ old('wife_name', $person->family->wife_name) }}"
                                                    name="wife_name" placeholder="Enter wife name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">Children Details </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Son Name</label>
                                                    <input type="text" class="form-control" name="son_name[]"
                                                        value="{{ old('son_name', $person->children[0]->son_name) }}"
                                                        placeholder="Enter son name"><br>
                                                    <input type="text" class="form-control" name="son_name[]"
                                                        value="{{ old('son_name', $person->children[1]->son_name) }}"
                                                        placeholder="Enter son name"><br>
                                                    <input type="text" class="form-control" name="son_name[]"
                                                        value="{{ old('son_name', $person->children[2]->son_name) }}"
                                                        placeholder="Enter son name"><br>

                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Daughter Name</label>
                                                    <input type="text" class="form-control" name="daughter_name[]"
                                                        value="{{ old('daughter_name', $person->children[0]->daughter_name) }}"
                                                        placeholder="Enter daughter name"><br>
                                                    <input type="text" class="form-control" name="daughter_name[]"
                                                        value="{{ old('daughter_name', $person->children[1]->daughter_name) }}"
                                                        placeholder="Enter daughter name"><br>
                                                    <input type="text" class="form-control" name="daughter_name[]"
                                                        value="{{ old('daughter_name', $person->children[2]->daughter_name) }}"
                                                        placeholder="Enter daughter name"><br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">Issue Details</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Issued Date</label>
                                            <input type="date" name="issue_date"
                                                value="{{ old('issue_date', $person->issue_date) }}"
                                                class="form-control" id="" placeholder="Enter Issued Date">
                                            @if ($errors->has('issue_date'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('issue_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Validity Date</label>
                                            <input type="date" name="validity_date"
                                                value="{{ old('validity_date', $person->validity_date) }}"
                                                class="form-control" id="" placeholder="Enter Validity Date">
                                            @if ($errors->has('validity_date'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('validity_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Issued By</label>
                                            <input type="text" name="issued_by"
                                                value="{{ old('issued_by', $person->issued_by) }}"
                                                class="form-control" id="" placeholder="Enter Issued By">
                                            @if ($errors->has('issued_by'))
                                                <span class="alert text-danger">{{ $errors->first('issued_by') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="row justify-content-center ">
                                    <button type="submit" class="btn btn-success "><i
                                            class="fa fa-check"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

    @include('person.common_js.select-box')
@endsection
