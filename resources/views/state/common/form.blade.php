<div class="m-3">
    <div class="form-group">
        <label for="name">Name</label>
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Enter name']) !!}
        @if ($errors->has('name'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('name') }}**</span>
        @endif
        <br>

        <label for="">Slug</label>
        {!! Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug', 'placeholder' => 'Enter Slug']) !!}
        @if ($errors->has('slug'))
            <span class="text-danger invalid feedback" role="alert">**{{ $errors->first('slug') }}**</span>
        @endif
        <br>
    </div>
</div>
