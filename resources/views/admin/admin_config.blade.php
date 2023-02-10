@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Configuracion</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Configuracion</h5>
    </div>
    <div class="card-body">
        
        <p>Bienvenido Configuración</p>
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
