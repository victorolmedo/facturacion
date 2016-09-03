@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New producto</h1>
    <hr/>

    {!! Form::open(['url' => '/productos', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('precio') ? 'has-error' : ''}}">
                {!! Form::label('precio', 'Precio', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('precio', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('stock') ? 'has-error' : ''}}">
                {!! Form::label('stock', 'Stock', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('stock', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('stock', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_categoria') ? 'has-error' : ''}}">
                {!! Form::label('id_categoria', 'Id Categoria', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('id_categoria', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_categoria', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('id_proveedor') ? 'has-error' : ''}}">
                {!! Form::label('id_proveedor', 'Id Proveedor', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('id_proveedor', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('id_proveedor', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('precio_unitario') ? 'has-error' : ''}}">
                {!! Form::label('precio_unitario', 'Precio Unitario', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('precio_unitario', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('precio_unitario', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('precio_venta') ? 'has-error' : ''}}">
                {!! Form::label('precio_venta', 'Precio Venta', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('precio_venta', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('precio_venta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('descuento') ? 'has-error' : ''}}">
                {!! Form::label('descuento', 'Descuento', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('descuento', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('descuento', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('iva') ? 'has-error' : ''}}">
                {!! Form::label('iva', 'Iva', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('iva', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('iva', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
            </div>
        </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection