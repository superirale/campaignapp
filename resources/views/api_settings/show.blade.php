@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">api_setting {{ $api_setting->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('api_settings/' . $api_setting->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit api_setting"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['api_settings', $api_setting->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete api_setting',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $api_setting->id }}</td>
                                    </tr>
                                    <tr><th> Key </th><td> {{ $api_setting->key }} </td></tr><tr><th> Secret </th><td> {{ $api_setting->secret }} </td></tr><tr><th> Optional </th><td> {{ $api_setting->optional }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection