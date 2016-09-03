@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Modo_pago {{ $modo_pago->id }}
        <a href="{{ url('modo_pagos/' . $modo_pago->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Modo_pago"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['modo_pagos', $modo_pago->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Modo_pago',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $modo_pago->id }}</td>
                </tr>
                <tr><th> Nombre </th><td> {{ $modo_pago->nombre }} </td></tr><tr><th> Descripcion </th><td> {{ $modo_pago->descripcion }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
