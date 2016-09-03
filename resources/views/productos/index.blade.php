@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Productos <a href="{{ url('/productos/create') }}" class="btn btn-primary btn-xs" title="Add New producto"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th> Nombre </th>
                    <th> Precio </th>
                    <th> Stock </th>
                    <th>Categoria</th>
                    <th>Proveedor</th>
                    <th>Precio Unitario</th>
                    <th>Precio de Venta</th>
                    <th>Descuentos</th>
                    <th>IVA</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($productos as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->nombre }}</td>
                    <td>{{ $item->precio }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->id_categoria }}</td>
                    <td>{{ $item->id_proveedor }}</td>
                    <td>{{ $item->precio_unitario }}</td>
                    <td>{{ $item->precio_venta }}</td>
                    <td>{{ $item->descuento }}</td>
                    <td>{{ $item->iva }}</td>


                    <td>
                        <a href="{{ url('/productos/' . $item->id_producto) }}" class="btn btn-success btn-xs" title="View Modo_pago"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/productos/' . $item->id_producto . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Modo_pago"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/productos', $item->id_producto],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete producto" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Modo_pago',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach            </tbody>
        </table>
        <div class="pagination-wrapper"> {!! $productos->render() !!} </div>
    </div>

</div>
@endsection
