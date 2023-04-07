@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Editar producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('productos.update', $producto->idproducto) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad:</label>
                        <input type="text" class="form-control" id="cantidad" name="cantidad" value="{{ $producto->cantidad }}">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción:</label>
                        <textarea class="form-control" id="descripcion" name="descripcion">{{ $producto->descripcion }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                        {{ $producto->imagen }}
                        <img src="{{ asset('imgproductos/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" height="100px" width="100px" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('products') }}" class="btn btn-secondary">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
    @stop

