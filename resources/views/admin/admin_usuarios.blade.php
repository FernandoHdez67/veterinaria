@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
<h1>Usuarios</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
    <button class="btn btn-info"><i class="fa-solid fa-plus"></i> Agregar Usuario</button>

    </div>
    <div class="card-body">

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Telfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuarios)
                <tr>
                    
                    <th scope="row">{{ $usuarios->idusuarios }}</th>
                    <td>{{ $usuarios->nombre }}</td>
                    <td>{{ $usuarios->apaterno }}</td>
                    <td>{{ $usuarios->amaterno }}</td>
                    <td>{{ $usuarios->telefono }}</td>
                    <td>{{ $usuarios->correo }}</td>
                    <td>{{ $usuarios->direccion }}</td>
                    <td>{{ $usuarios->nombre_usuario }}</td>
                    <td>{{ $usuarios->contrasenia }}</td>
                    <td><a class="btn btn-success" href="#">Editar</a> <a class="btn btn-danger" href="#">Eliminar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
