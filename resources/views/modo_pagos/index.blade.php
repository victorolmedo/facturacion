@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Modo_pagos <a href="{{ url('/modo_pagos/create') }}" class="btn btn-primary btn-xs" title="Add New Modo_pago"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> Nombre </th><th> Descripcion </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($modo_pagos as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td><td>{{ $item->descripcion }}</td>
                    <td>
                        <a href="{{ url('/modo_pagos/' . $item->id) }}" class="btn btn-success btn-xs" title="View Modo_pago"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/modo_pagos/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Modo_pago"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/modo_pagos', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Modo_pago" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Modo_pago',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $modo_pagos->render() !!} </div>
    </div>

</div>
@endsection
