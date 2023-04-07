@extends('adminlte::page')

@section('title', 'Respaldos')

@section('content_header')
<h1>Configuracion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">

    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <a class="btn btn-success" href="{{ route('respaldo.backup') }}">Realizar copia de seguridad</a>
            </div>
            <div class="col-4">
                <form method="POST" action="{{ route('restore-db') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input  class="form-control"  type="file" name="file" id="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Restaurar</button>
                </form>
            </div>
            <div class="col-4">
                <form method="POST" action="{{ route('eliminar-bd') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Eliminar base de datos</button>
                </form>                
            </div>
        </div>
    </div>
</div>
@stop

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif


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
