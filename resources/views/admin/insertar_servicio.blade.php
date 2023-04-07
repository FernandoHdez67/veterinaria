@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Agregar Servicio</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('insertar.servicio') }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="tipo">Nombre <b style="color: red">*</b></label>
                        <input type="text" name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo') }}">
                        @error('tipo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion <b style="color: red">*</b></label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control @error('imagen') is-invalid @enderror" name="imagen" type="file" id="imagen">
                        @error('imagen')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('services') }}" class="btn btn-secondary">Cancelar</a>
                </form>

            </div>
        </div>
    </div>
    @stop

    @section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @stop

    @section('js')
    <script>
        Swal.fire(
            'Buen Trabajo!'
            , 'Tarea exitosa!'
            , 'success'
        )

    </script>
    @stop
