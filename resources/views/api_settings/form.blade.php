<div class="form-group {{ $errors->has('key') ? 'has-error' : ''}}">
    {!! Form::label('key', 'Key', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('key', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('key', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('secret') ? 'has-error' : ''}}">
    {!! Form::label('secret', 'Secret', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('secret', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('secret', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('optional') ? 'has-error' : ''}}">
    {!! Form::label('optional', 'Optional', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('optional', null, ['class' => 'form-control']) !!}
        {!! $errors->first('optional', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>