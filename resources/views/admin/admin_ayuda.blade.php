@extends('adminlte::page')

@section('title', 'Ayuda')

@section('content_header')
<h1>Preguntas Frecuentes</h1>
@stop

@section('content')
<div id="contenido" class="contenido">
    @role('admin')
    <p>Esto lo puede ver el administrador</p>
    @endrole
    @role('veterinario')
    <p>Esto lo puede ver el veterinario</p>
    @endrole
    <div class="card">
        <div class="card-header">
            <a class="btn btn-info" href="{{ Route('agregar-pregunta') }}"><i class="fa-solid fa-plus"></i> Nueva Pregunta</a>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">respuesta</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ayuda as $ayuda)
                        <tr>

                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $ayuda->pregunta }}</td>
                            <td>{{ $ayuda->respuesta }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('ayuda.edit', $ayuda->idpregunta) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form method="POST" action="{{ route('destroy.ayuda', $ayuda->idpregunta) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pregunta?')"><i class="fa-solid fa-trash-can"></i></button>
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
