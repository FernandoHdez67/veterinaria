@extends('adminlte::page')

@section('title', 'Productos')

@section('content_header')
<h1>Productos</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-info" href="{{ Route('nuevo-producto') }}"><i class="fa-solid fa-plus"></i> Agregar producto</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
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

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $productos->nombre }}</td>
                        <td>{{ '$'.$productos->precio }}</td>
                        <td>{{ $productos->cantidad }}</td>
                        <td>{{ $productos->descripcion }}</td>
                        <td><img src="{{ 'imgproductos/'.$productos->imagen}}" class="card-img-top" alt="" width="50px" height="50px"></td>
                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('productos.edit', $productos->idproducto) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="{{ route('destroy.producto', $productos->idproducto) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
