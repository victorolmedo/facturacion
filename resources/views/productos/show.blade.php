@extends('layouts.app')

@section('content')
<div class="container">

    <h1>producto {{ $producto->id }}
        <a href="{{ url('productos/' . $producto->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit producto"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['productos', $producto->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete producto',
                    'onclick'=>'return confirm("Confirm delete?")'
            ))!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $producto->id }}</td>
                </tr>
                <tr><th> Nombre </th><td> {{ $producto->nombre }} </td></tr><tr><th> Precio </th><td> {{ $producto->precio }} </td></tr><tr><th> Stock </th><td> {{ $producto->stock }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
