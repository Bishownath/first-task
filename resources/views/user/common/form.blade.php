<div class="m-3">
    <div class="form-group">
        <label for="fullname">Name</label>
        {!! Form::text('fullname', null, ['class' => 'form-control', 'id' => 'fullname', 'placeholder' => 'Enter fullname']) !!}

        <label for="address">Address</label>
        {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'address', 'placeholder' => 'Enter address']) !!}

        <label for="email">Email</label>
        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Enter email']) !!}

        <label for="password">Password</label>
        {!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'Enter password']) !!}

        <div class="mt-2 justify-content-center d-flex">
            <button class="btn btn-success"><i class="fa fa-check">Submit</i></button>
        </div>
    </div>
</div>
