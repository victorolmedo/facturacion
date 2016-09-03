@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Proveedores <a href="{{ url('/proveedores/create') }}" class="btn btn-primary btn-xs" title="Add New Proveedore"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre </th><th> Ruc </th><th> Telefono </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($proveedores as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td><td>{{ $item->ruc }}</td><td>{{ $item->telefono }}</td>
                    <td>
                        <a href="{{ url('/proveedores/' . $item->id) }}" class="btn btn-success btn-xs" title="View Proveedore"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/proveedores/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Proveedore"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/proveedores', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Proveedore" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Proveedore',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $proveedores->render() !!} </div>
    </div>

</div>
@endsection
