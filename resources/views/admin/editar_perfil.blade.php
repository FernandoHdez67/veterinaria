@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
<h1>Editar Perfil</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="#" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre: <b style="color: red">*</b></label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo: <b style="color: red">*</b></label>
                        <input type="text" name="correo" id="correo" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Contraseña: <b style="color: red">*</b></label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen: <b style="color: red">*</b></label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
                        <img src="" alt="" height="100px" width="100px" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="#" class="btn btn-secondary">Cancelar</a>

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
