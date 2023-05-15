@extends('adminlte::page')

@section('title', 'Carrusel')

@section('content_header')
<h1>Agregar Imagen</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('nueva-imagen') }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nombre">Nombre <b style="color: red">*</b></label>
                        <input type="text" name="nombre" id="nombre" class="form-control" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" name="imagen" type="file" id="imagen" accept="image/jpeg, image/png">
                    </div>


                    <button type="submit" class="btn btn-success">Guardar</button>

                    <a href="{{ route('carruseladmin') }}" class="btn btn-secondary">Cancelar</a>

            </div>


        </div>
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
