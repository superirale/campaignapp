<div class="form-group {{ $errors->has('host') ? 'has-error' : ''}}">
    {!! Form::label('host', 'Host', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('host', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('host', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('port') ? 'has-error' : ''}}">
    {!! Form::label('port', 'Port', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('port', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('port', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('encryption') ? 'has-error' : ''}}">
    {!! Form::label('encryption', 'Encryption', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('encryption', ['ssl', 'tls', 'none'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('encryption', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('username') ? 'has-error' : ''}}">
    {!! Form::label('username', 'Username', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
        {!! $errors->first('username', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>