@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Clientes <a href="{{ url('/clientes/create') }}" class="btn btn-primary btn-xs" title="Add New cliente"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre </th><th> Apellido </th><th> Ci </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($clientes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->apellido }}</td>
                    <td>{{ $item->ci }}</td>
                    <td>
                        <a href="{{ url('/clientes/' . $item->id) }}" class="btn btn-success btn-xs" title="View Proveedore"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/clientes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Proveedore"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/clientes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete clientes" />', array(
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
        <div class="pagination-wrapper"> {!! $clientes->render() !!} </div>
    </div>

</div>
@endsection
