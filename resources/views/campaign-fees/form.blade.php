<div class="form-group {{ $errors->has('currency') ? 'has-error' : ''}}">
    {!! Form::label('currency', 'Currency', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('currency', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('currency', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('delivery_fee') ? 'has-error' : ''}}">
    {!! Form::label('delivery_fee', 'Delivery Fee', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('delivery_fee', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('delivery_fee', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('cost_per_recipient') ? 'has-error' : ''}}">
    {!! Form::label('cost_per_recipient', 'Cost Per Recipient', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cost_per_recipient', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('cost_per_recipient', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('no_of_emails_per_month') ? 'has-error' : ''}}">
    {!! Form::label('no_of_emails_per_month', 'No Of Emails Per Month', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('no_of_emails_per_month', null, ['class' => 'form-control', 'required' => 'required']) !!}
        {!! $errors->first('no_of_emails_per_month', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>