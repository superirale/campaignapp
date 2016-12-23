@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Api_settings</div>
                    <div class="panel-body">

                        <a href="{{ url('/api_settings/create') }}" class="btn btn-primary btn-xs" title="Add New api_setting"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Key </th><th> Secret </th><th> Optional </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($api_settings as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->key }}</td><td>{{ $item->secret }}</td><td>{{ $item->optional }}</td>
                                        <td>
                                            <a href="{{ url('/api_settings/' . $item->id) }}" class="btn btn-success btn-xs" title="View api_setting"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/api_settings/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit api_setting"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/api_settings', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete api_setting" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete api_setting',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $api_settings->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection