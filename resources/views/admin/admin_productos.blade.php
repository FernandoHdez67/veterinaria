@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
<h1>Productos</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
    <button class="btn btn-info"><i class="fa-solid fa-plus"></i> Agregar producto</button>

    </div>
    <div class="card-body">

        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $productos)
                <tr>
                    
                    <th scope="row">{{ $productos->idproducto }}</th>
                    <td>{{ $productos->nombre }}</td>
                    <td>{{ '$'.$productos->precio }}</td>
                    <td>{{ $productos->cantidad }}</td>
                    <td>{{ $productos->descripcion }}</td>
                    <td><img src="{{ 'imgproductos/'.$productos->imagen}}" class="card-img-top" alt="" width="50px" height="50px"></td>
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
        'Buen Trabajo!'
        , 'Tarea exitosa!'
        , 'success'
    )

</script>
@stop
