@extends('layouts.app')

@section('content')
<div class="container">

    <h1>cliente {{ $cliente->id }}
        <a href="{{ url('clientes/' . $cliente->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit cliente"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['clientes', $cliente->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete cliente',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $cliente->id }}</td>
                </tr>
                <tr><th> Nombre </th><td> {{ $cliente->nombre }} </td></tr><tr><th> Apellido </th><td> {{ $cliente->apellido }} </td></tr><tr><th> Ci </th><td> {{ $cliente->ci }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
