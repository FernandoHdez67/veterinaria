@extends('adminlte::page')

@section('title', 'Carrusel')

@section('content_header')
<h1>Editar Carrusel</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('imagen.update', $carrucel->idimagen) }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nombre">Nombre: <b style="color: red">*</b></label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $carrucel->nombre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen: <b style="color: red">*</b></label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg, image/png"> <br>
            
                        <img src="{{ asset('imgcarrucel/' . $carrucel->imagen) }}" alt="" height="100px" width="100px" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('carruseladmin') }}" class="btn btn-secondary">Cancelar</a>

                </form>
            </div>
        </div>
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
