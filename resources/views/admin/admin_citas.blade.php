@extends('adminlte::page')

@section('title', 'Citas')

@section('content_header')
<h1>Citas</h1>
@stop

@section('content')
<div class="card">
    {{-- <div class="card-header">
        <a class="btn btn-info" href="{{ Route('nuevo-producto') }}"><i class="fa-solid fa-plus"></i> Agregar producto</a>
    </div> --}}
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Raza</th>
                        <th scope="col">Propietario</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Razon</th>
                        <th scope="col">Acciones</th>
                        {{-- <th scope="col">Acciones</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($citas as $citas)
                    <tr>

                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $citas->nombre_mascota }}</td>
                        <td>{{ $citas->raza_mascota }}</td>
                        <td>{{ $citas->nombre_propietario }}</td>
                        <td>{{ $citas->telefono_propietario }}</td>
                        <td>{{ $citas->edad_mascota.'años' }}</td>
                        <td>{{ $citas->sexo_mascota }}</td>
                        <td>{{ $citas->fecha_cita }}</td>
                        <td>{{ $citas->hora_cita }}</td>
                        <td>{{ $citas->razon_cita }}</td>
                        <td>
                            <form method="POST" action="#">
                                @csrf
                                <a href="#" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')"><i class="fa-solid fa-trash-can"></i></button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop





