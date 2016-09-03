@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Proveedore {{ $proveedore->id }}
        <a href="{{ url('proveedores/' . $proveedore->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Proveedore"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
        {!! Form::open([
            'method'=>'DELETE',
            'url' => ['proveedores', $proveedore->id],
            'style' => 'display:inline'
        ]) !!}
            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                    'type' => 'submit',
                    'class' => 'btn btn-danger btn-xs',
                    'title' => 'Delete Proveedore',
                    'onclick'=>'return confirm("Confirm delete?")'
            ));!!}
        {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID</th><td>{{ $proveedore->id }}</td>
                </tr>
                <tr><th> Nombre </th><td> {{ $proveedore->nombre }} </td></tr><tr><th> Ruc </th><td> {{ $proveedore->ruc }} </td></tr><tr><th> Telefono </th><td> {{ $proveedore->telefono }} </td></tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
