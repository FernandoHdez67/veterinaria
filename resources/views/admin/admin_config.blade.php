@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Configuracion</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        <div class="row">
            <div class="col-6">
                <a class="btn btn-success" href="https://respaldo.proyectowebuni.com/php/" target="_blank">Base de datos</a>
                {{-- <a class="btn btn-success" href="{{ route('respaldo.backup') }}">Realizar copia de seguridad</a> --}}
            </div>
            <div class="col-6">
                {{-- <form method="POST" action="{{ route('restore-db') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <input  class="form-control"  type="file" name="file" id="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Restaurar</button>
                </form> --}}
            </div>
        </div>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-success table-striped">
                <thead>
                    <tr>
                        {{-- <th scope="col">#</th> --}}
                        <th scope="col">Mision</th>
                        <th scope="col">Vision</th>
                        <th scope="col">Valores</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($somos as $somos)
                    <tr>

                        {{-- <th scope="row">{{ $loop->iteration }}</th> --}}
                        <td>{{ $somos->mision }}</td>
                        <td>{{ $somos->vision }}</td>
                        <td>{!! nl2br(e($somos->valores)) !!}</td>
                        <td><img src="{{ 'imgconfig/'.$somos->imgsomos}}" class="card-img-top" alt="" width="50px" height="50px"></td>
                        <td>
                            <form method="POST" action="">
                                @csrf
                                <a href="{{ route('somos.edit', $somos->idconfiguracion) }}" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
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
