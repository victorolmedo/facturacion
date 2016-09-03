@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit cliente {{ $cliente->id }}</h1>

    {!! Form::model($cliente, [
        'method' => 'PATCH',
        'url' => ['/clientes', $cliente->id],
        'class' => 'form-horizontal',
        'files' => true
    ]) !!}

                    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : ''}}">
                {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('apellido') ? 'has-error' : ''}}">
                {!! Form::label('apellido', 'Apellido', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('apellido', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ci') ? 'has-error' : ''}}">
                {!! Form::label('ci', 'Ci', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('ci', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ci', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ruc') ? 'has-error' : ''}}">
                {!! Form::label('ruc', 'Ruc', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('ruc', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ruc', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('telefono') ? 'has-error' : ''}}">
                {!! Form::label('telefono', 'Telefono', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('telefono', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('telefono', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('fecnac') ? 'has-error' : ''}}">
                {!! Form::label('fecnac', 'Fecnac', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('fecnac', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('fecnac', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : ''}}">
                {!! Form::label('direccion', 'Direccion', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('direccion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('direccion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('foto') ? 'has-error' : ''}}">
                {!! Form::label('foto', 'Foto', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('foto', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('created_at') ? 'has-error' : ''}}">
                {!! Form::label('created_at', 'Created At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('created_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('created_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('updated_at') ? 'has-error' : ''}}">
                {!! Form::label('updated_at', 'Updated At', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('updated_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('updated_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-3">
                {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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