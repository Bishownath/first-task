<div class="m-3">
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name']) !!}

        {{-- <label for="address">Address</label>
        {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Enter address']) !!} --}}

        <label for="email">Email</label>
        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email']) !!}

        <label for="password">Password</label><br>
        {!! Form::password('password', null, ['class' => 'custom form-control', 'id' => 'password', 'placeholder' => 'Enter password']) !!}

    </div>
</div>
