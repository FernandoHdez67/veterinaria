@extends('adminlte::page')

@section('title', 'Carrucel')

@section('content_header')
<h1>Carrucel</h1>
@stop

@section('content')
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
                        <th>{{ $ayuda->pregunta }}</th>
                        <th>{{ $ayuda->respuesta }}</th>
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
