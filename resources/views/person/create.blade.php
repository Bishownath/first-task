@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="m-5">
                    <form action="{{ route('person.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                    @if ($errors->has('name'))
                                        <span class="alert text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" name="email" class="form-control" id="email"
                                        placeholder="Enter email">
                                    @if ($errors->has('email'))
                                        <span class="alert text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address"
                                        placeholder="Enter address">
                                    @if ($errors->has('address'))
                                        <span class="alert text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="address_2">Address 2</label>
                                    <input type="text" name="address_2" class="form-control" id="address_2"
                                        placeholder="Enter address 2 optional">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">

                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="tel" name="phone_number" class="form-control" id="phone_number"
                                        placeholder="Enter phone_number">
                                    @if ($errors->has('phone_number'))
                                        <span class="alert text-danger">{{ $errors->first('phone_number') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="tel" name="mobile_number" class="form-control" id="mobile_number"
                                        placeholder="Enter mobile_number">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="state_id">State ID</label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option selected>Select State ID</option>
                                        @foreach ($state as $st)
                                            <option value="{{ $st->id }}">{{ $st->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('state_id'))
                                        <span class="alert text-danger">{{ $errors->first('state_id') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="district_id">District ID</label>
                                    <select name="district_id" id="district_id" class="form-control">
                                        <option selected>Select District ID</option>
                                        @foreach ($district as $dist)
                                            <option value="{{ $dist->id }}">{{ $dist->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('district_id'))
                                        <span class="alert text-danger">{{ $errors->first('district_id') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Municipality ID</label>
                                    <select name="municipality_id" id="municipality_id" class="form-control">
                                        <option selected>Select Municipality ID</option>
                                        @foreach ($municipality as $mn)
                                            <option value="{{ $mn->id }}">{{ $mn->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('municipality_id'))
                                        <span class="alert text-danger">{{ $errors->first('municipality_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Age</label>
                                        <input type="text" name="age" class="form-control" id="" placeholder="Enter Age ">
                                        @if ($errors->has('age'))
                                            <span class="alert text-danger">{{ $errors->first('age') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <select name="gender" class="form-control">
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                        </select>
                                        @if ($errors->has('gender'))
                                            <span class="alert text-danger">{{ $errors->first('gender') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control" id="" placeholder="Enter ">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Citizenship Number</label>
                                        <input type="text" name="citizenship_number" class="form-control" id=""
                                            placeholder="Enter ">
                                        @if ($errors->has('citizenship_number'))
                                            <span
                                                class="alert text-danger">{{ $errors->first('citizenship_number') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Passport Number</label>
                                        <input type="text" name="passport_number" class="form-control" id=""
                                            placeholder="Enter ">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Blood Group</label>
                                        <input type="text" name="blood_group" class="form-control" id=""
                                            placeholder="Enter ">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Date Of Birth</label>
                                        <input type="date" name="date_of_birth" class="form-control" id=""
                                            placeholder="Enter ">
                                        @if ($errors->has('date_of_birth'))
                                            <span class="alert text-danger">{{ $errors->first('date_of_birth') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Grandfather Name</label>
                                            <input type="text" name="grandfather_name" class="form-control" id=""
                                                placeholder="Enter ">
                                            @if ($errors->has('grandfather_name'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('grandfather_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Father Name</label>
                                            <input type="text" name="father_name" class="form-control" id=""
                                                placeholder="Enter ">
                                            @if ($errors->has('father_name'))
                                                <span
                                                    class="alert text-danger">{{ $errors->first('father_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="row ml-3">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Issued Date</label>
                                                <input type="date" name="issue_date" class="form-control" id=""
                                                    placeholder="Enter ">
                                                @if ($errors->has('issue_date'))
                                                    <span
                                                        class="alert text-danger">{{ $errors->first('issue_date') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Validity Date</label>
                                                <input type="date" name="validity_date" class="form-control" id=""
                                                    placeholder="Enter ">
                                                @if ($errors->has('validity_date'))
                                                    <span
                                                        class="alert text-danger">{{ $errors->first('validity_date') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Issued From</label>
                                                <input type="text" value="now()" name="issued_from" class="form-control"
                                                    id="" placeholder="Enter ">
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="">Issued By</label>
                                                <input type="text" name="issued_by" class="form-control" id=""
                                                    placeholder="Enter ">
                                                @if ($errors->has('issued_by'))
                                                    <span
                                                        class="alert text-danger">{{ $errors->first('issued_by') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mb-2">
                                    <button type="submit" class="btn btn-success "><i
                                            class="fa fa-check"></i>Submit</button>
                                </div>

                            </div>
                        </div>
                </div>
            @endsection
