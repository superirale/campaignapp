@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Smtp_settings</div>
                    <div class="panel-body">

                        <a href="{{ url('/smtp_settings/create') }}" class="btn btn-primary btn-xs" title="Add New smtp_setting"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th> Host </th><th> Port </th><th> Encryption </th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($smtp_settings as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->host }}</td><td>{{ $item->port }}</td><td>{{ $item->encryption }}</td>
                                        <td>
                                            <a href="{{ url('/smtp_settings/' . $item->id) }}" class="btn btn-success btn-xs" title="View smtp_setting"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                                            <a href="{{ url('/smtp_settings/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit smtp_setting"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/smtp_settings', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete smtp_setting" />', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete smtp_setting',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $smtp_settings->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection