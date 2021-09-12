<div class="m-5">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
        @if ($errors->has('name'))
            <span class="alert text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
    </div>

    <div class="form-group">
        <label for="address_2">Address 2</label>
        <input type="text" name="address_2" class="form-control" id="address_2" placeholder="Enter address 2 optional">
    </div>

    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input type="tel" name="phone_number" class="form-control" id="phone_number" placeholder="Enter phone_number">
    </div>

    <div class="form-group">
        <label for="mobile_number">Mobile Number</label>
        <input type="tel" name="mobile_number" class="form-control" id="mobile_number"
            placeholder="Enter mobile_number">
    </div>

    <div class="form-group">
        <label for="state_id">State ID</label>
        <input type="number" name="state_id" class="form-control" id="state_id" placeholder="Enter state_id">
    </div>

    <div class="form-group">
        <label for="district_id">District ID</label>
        <input type="number" name="district_id" class="form-control" id="" placeholder="Enter State ID">
    </div>

    <div class="form-group">
        <label for="">Municipality ID</label>
        <input type="number" name="municipality_id" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Age</label>
        <input type="text" name="age" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Gender</label>
        <input type="text" name="gender" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Citizenship Number</label>
        <input type="text" name="citizenship_number" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Passport Number</label>
        <input type="text" name="passport_number" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Blood Group</label>
        <input type="text" name="blood_group" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Date Of Birth</label>
        <input type="date" name="date_of_birth" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Grandfather Name</label>
        <input type="text" name="grandfather_name" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Father Name</label>
        <input type="text" name="father_name" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Issued Date</label>
        <input type="date" name="issued_date" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Validity Date</label>
        <input type="date" name="validity_date" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Issued From</label>
        <input type="text" name="issued_from" class="form-control" id="" placeholder="Enter ">
    </div>

    <div class="form-group">
        <label for="">Issued By</label>
        <input type="text" name="issued_by" class="form-control" id="" placeholder="Enter ">
    </div>
</div>
