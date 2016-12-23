<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('from_name') ? 'has-error' : ''}}">
    {!! Form::label('from_name', 'From Name', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('from_name', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('from_name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('from_email') ? 'has-error' : ''}}">
    {!! Form::label('from_email', 'From Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('from_email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('from_email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('reply_email') ? 'has-error' : ''}}">
    {!! Form::label('reply_email', 'Reply Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('reply_email', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('reply_email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('logo_ref') ? 'has-error' : ''}}">
    {!! Form::label('logo_ref', 'Logo Ref', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('logo_ref', null, ['class' => 'form-control']) !!}
        {!! $errors->first('logo_ref', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
    {!! Form::label('user_id', 'User Id', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>