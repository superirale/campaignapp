@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Subscriber {{ $subscriber->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('subscribers/' . $subscriber->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Subscriber"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['subscribers', $subscriber->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Subscriber',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $subscriber->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $subscriber->name }} </td></tr><tr><th> Email </th><td> {{ $subscriber->email }} </td></tr><tr><th> Phone </th><td> {{ $subscriber->phone }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection