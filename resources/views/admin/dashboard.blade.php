@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
<h1>Tablero</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Hola Mundo</h5>
    </div>
    <div class="card-body">
        
        <p>Bienvenido al tablero de Administrador</p>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
  'Buen Trabajo!',
  'Tarea exitosa!',
  'success'
)
</script>
@stop
