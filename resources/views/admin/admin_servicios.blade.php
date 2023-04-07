@extends('adminlte::page')

@section('title', 'Servicios')

@section('content_header')
<h1>Servicios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <a class="btn btn-info" href="{{ Route('nuevo-servicio') }}"><i class="fa-solid fa-plus"></i> Agregar Servicio</a>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $services)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $services->tipo }}</td>
                        <td>{{ $services->descripcion }}</td>
                        <td><img src="{{ 'imgservicios/'.$services->imagen}}" class="card-img-top" alt="" width="50px" height="50px"></td>

                        <td>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('servicios.edit', $services->idservicio) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="{{ route('destroy.servicios', $services->idservicio) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este Servicio?')"><i class="fa-solid fa-trash-can"></i></button>
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
