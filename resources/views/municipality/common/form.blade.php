<div class="m-3">
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name']) !!}
        @if ($errors->has('name'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('name') }}**</span>
        @endif
        <br>
       
        <label for="code">Code</label>
        {!! Form::text('code', null, ['class' => 'form-control', 'id' => 'code', 'placeholder' => 'Enter code']) !!}
        @if ($errors->has('code'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('code') }}**</span>
        @endif
        <br>
       
        <label for="ward_number">Ward Number</label>
        {!! Form::text('ward_number', null, ['class' => 'form-control', 'id' => 'ward_number', 'placeholder' => 'Enter Ward Number']) !!}
        @if ($errors->has('ward_number'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('ward_number') }}**</span>
        @endif
        <br>
       
        <label for="district_id">District ID</label>
        {!! Form::select('district_id', $district, ['class' => 'form-control', 'id' => 'district_id', 'placeholder' => 'Enter district ID']) !!}
        @if ($errors->has('district_id'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('district_id') }}**</span>
        @endif
        <br>
    </div>
</div>