@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Agregar producto</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('insertar.producto') }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="precio">Nombre <b style="color: red">*</b></label>
                        <input type="text" name="nombre" id="nombre" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio <b style="color: red">*</b></label>
                        <input type="text" name="precio" id="precio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Stock <b style="color: red">*</b></label>
                        <input type="text" name="cantidad" id="cantidad" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion <b style="color: red">*</b></label>
                        <textarea class="form-control" id="descripcion" name="descripcion"></textarea>

                    </div>
                    <div class="form-group">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" name="imagen" type="file" id="imagen">
                    </div>


                    <button type="submit" class="btn btn-success">Guardar</button>

                    <a href="{{ route('products') }}" class="btn btn-secondary">Cancelar</a>

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
