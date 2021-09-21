@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="m-5">
                    <form action="{{ route('person.update', $person->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ old('name', $person->name) }}"
                                        class="form-control" id="name" placeholder="Enter name">
                                    @if ($errors->has('name'))
                                        <span class="alert text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" name="email" value="{{ old('email', $person->email) }}"
                                        class="form-control" id="email" placeholder="Enter email">
                                    @if ($errors->has('email'))
                                        <span
                                            class="feedback text-center text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" value="{{ old('address', $person->address) }}"
                                        class="form-control" id="address" placeholder="Enter address">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address_2">Address 2</label>
                                    <input type="text" name="address_2" value="{{ old('address_2', $person->address_2) }}"
                                        class="form-control" id="address_2" placeholder="Enter address 2 optional">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" name="phone_number"
                                        value="{{ old('phone_number', $person->phone_number) }}" class="form-control"
                                        id="phone_number" placeholder="Enter phone_number">
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="tel" name="mobile_number"
                                        value="{{ old('mobile_number', $person->mobile_number) }}" class="form-control"
                                        id="mobile_number" placeholder="Enter mobile_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state_id">State ID</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        @foreach ($state as $st)
                                            <option value="{{ $st->id }}"
                                                {{ $st->id == $person->state_id ? 'selected' : '' }}>
                                                {{ $st->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district_id">District ID</label>
                                    <select name="district_id" id="district_id" class="form-control">
                                        @foreach ($district as $dist)
                                            <option value="{{ $dist->id }}"
                                                {{ $dist->id == $person->district_id ? 'selected' : '' }}>
                                                {{ $dist->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Municipality ID</label>
                                    <select name="municipality_id" id="municipality_id" class="form-control">
                                        @foreach ($municipality as $mn)
                                            <option value="{{ $mn->id }}"
                                                {{ $mn->id == $person->municipality_id ? 'selected' : '' }}>
                                                {{ $mn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Age</label>
                                    <input type="number" name="age" min="1" value="{{ old('age', $person->age) }}"
                                        class="form-control" id="" placeholder="Enter ">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select name="gender" value="{{ old('gender', $person->gender) }}" id="gender"
                                        class="form-control">
                                        <option value="male" {{ $person->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ $person->gender == 'female' ? 'selected' : '' }}>Female
                                        </option>
                                        <option value="other" {{ $person->gender == 'other' ? 'selected' : '' }}>Other
                                        </option>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" value="{{ old('image', $person->image) }}"
                                        {{ $person->image }} class="form-control">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Existing Image</label><br>
                                    @if ($person->image)
                                        <img src="{{ asset('images/person/' . $person->image) }}" alt="" height="50px"
                                            width="50px">
                                    @else
                                        <img src="" alt="No Image">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Citizenship Number</label>
                                    <input type="text" name="citizenship_number"
                                        value="{{ old('citizenship_number', $person->citizenship_number) }}"
                                        class="form-control" id="" placeholder="Enter ">
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Passport Number</label>
                                    <input type="text" name="passport_number"
                                        value="{{ old('passport_number', $person->passport_number) }}"
                                        class="form-control" id="" placeholder="Enter ">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Blood Group</label>
                                    <select name="blood_group" id="" class="form-control">
                                        <option value="" selected>Select Blood Group</option>
                                        <option value="o+" {{ $person->blood_group == 'o+' ? 'selected' : '' }}>O+
                                        </option>
                                        <option value="ab-" {{ $person->blood_group == 'ab-' ? 'selected' : '' }}>AB-
                                        </option>
                                        <option value="ab+" {{ $person->blood_group == 'ab+' ? 'selected' : '' }}>AB+
                                        </option>
                                        <option value="o-" {{ $person->blood_group == 'o-' ? 'selected' : '' }}>O-
                                        </option>
                                        <option value="b+" {{ $person->blood_group == 'b+' ? 'selected' : '' }}>B+
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Date Of Birth</label>
                                    <input type="date" name="date_of_birth"
                                        value="{{ old('date_of_birth', $person->date_of_birth) }}" class="form-control"
                                        id="" placeholder="Enter ">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Grandfather Name</label>
                                    {{-- {{ dd($person->family) }} --}}
                                    <input type="text" name="grandfather_name"
                                        value="{{ old('grandfather_name', $person->family->grandfather_name) }}"
                                        class="form-control" id="" placeholder="Enter ">
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Father Name</label>
                                    <input type="text" name="father_name"
                                        value="{{ old('father_name', $person->family->father_name) }}"
                                        class="form-control" id="" placeholder="Enter ">
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
                                        <input type="text" class="form-control" name="mother_name"
                                            value="{{ old('mother_name', $person->family->mother_name) }}"
                                            placeholder="Enter mother name">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Wife Name</label>
                                        <input type="text" class="form-control" name="wife_name"
                                            value="{{ old('wife_name', $person->family->wife_name) }}"
                                            placeholder="Enter wife name">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Son Name</label>
                                        {{-- {{ dump($person->children) }}
                                        {{ dd($person->children[0]) }} --}}
                                        {{-- {{ dd($person->children[0]->son_name) }} --}}
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
                                <div class="col-md-5">
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

                            <div class="row ml-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Issued Date</label>
                                        <input type="date" name="issued_date"
                                            value="{{ old('issue_date', $person->issue_date) }}" class="form-control"
                                            id="" placeholder="Enter ">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Validity Date</label>
                                        <input type="date" name="validity_date"
                                            value="{{ old('validity_date', $person->validity_date) }}"
                                            class="form-control" id="" placeholder="Enter ">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Issued By</label>
                                        <input type="text" name="issued_by"
                                            value="{{ old('issued_by', $person->issued_by) }}" class="form-control"
                                            id="" placeholder="Enter ">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mb-2">
                            <button type="submit" class="btn btn-success "><i class="fa fa-check"></i>Update</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
    @include('person.common_js.select-box')
@endsection
