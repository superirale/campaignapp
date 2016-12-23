@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">CampaignFee {{ $campaignfee->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('campaign-fees/' . $campaignfee->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit CampaignFee"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['campaignfees', $campaignfee->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete CampaignFee',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $campaignfee->id }}</td>
                                    </tr>
                                    <tr><th> Currency </th><td> {{ $campaignfee->currency }} </td></tr><tr><th> Delivery Fee </th><td> {{ $campaignfee->delivery_fee }} </td></tr><tr><th> Cost Per Recipient </th><td> {{ $campaignfee->cost_per_recipient }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection