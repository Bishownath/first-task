<div class="m-3">
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name']) !!}
        @if ($errors->has('name'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('name') }}**</span>
        @endif
        <br>
        
        <label for="email">Email</label>
        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email']) !!}
        @if ($errors->has('email'))
        <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('email') }}**</span>
        @endif
        <br>
        
        <label class="" for="image">Upload Image</label><br>
        <input type="file" name="image" id="image" class="form-control">
        {{-- {!! Form::file('image', null, ['class' => 'form-control', 'id' => 'image', 'placeholder' => 'Upload image']) !!} --}}
        <br>
        @if ($errors->has('image'))
        <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('image') }}**</span>
        @endif
        <br>

        <label for="password">Password</label><br>
        {!! Form::password('password', null, ['class' => 'custom form-control', 'id' => 'password', 'placeholder' => 'Enter password']) !!}
        @if ($errors->has('password'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('password') }}**</span>
        @endif
        <br>
    </div>
</div>
