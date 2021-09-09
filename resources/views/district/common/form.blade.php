<div class="m-3">
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name']) !!}
        @if ($errors->has('name'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('name') }}**</span>
        @endif
        <br>
       
        <label for="state_id">State ID</label>
        {!! Form::select('state_id', $state, ['class' => 'form-control', 'id' => 'state_id', 'placeholder' => 'Enter State ID']) !!}
        @if ($errors->has('state_id'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('state_id') }}**</span>
        @endif
        <br>
    </div>
</div>