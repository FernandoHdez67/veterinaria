@extends('adminlte::page')

@section('title', 'Quienes Somos')

@section('content_header')
<h1>Configuración</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Quienes somos</h5>
    </div>
    <div class="card-body">

        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('somos.update', $somos->idconfiguracion) }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="mision">Mision <b style="color: red">*</b></label>
                        <textarea class="form-control" id="mision" name="mision">{{ $somos->mision }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="vision">Vision <b style="color: red">*</b></label>
                        <textarea class="form-control" id="vision" name="vision">{{ $somos->vision }}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="valores">Valores <b style="color: red">*</b></label>
                        <textarea class="form-control" id="valores" name="valores">{{ $somos->valores }}</textarea>

                    </div>
                    <div class="form-group">
                        <label for="imgsomos">Imagen <b style="color: red">*</b></label>
                        <input type="file" class="form-control" id="imgsomos" name="imgsomos">
                        {{ $somos->imgsomos }}
                        <img src="{{ asset('imgconfig/'.$somos->imgsomos) }}" alt="{{ $somos->imgsomos }}" height="100px" width="100px" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('configuracion') }}" class="btn btn-secondary">Cancelar</a>

                </form>
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

