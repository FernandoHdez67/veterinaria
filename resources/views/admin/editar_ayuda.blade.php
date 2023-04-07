@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Editar Pregunta</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('ayuda.update', $ayuda->idpregunta) }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pregunta">Pregunta <b style="color: red">*</b></label>
                        <input type="text" name="pregunta" id="pregunta" class="form-control @error('pregunta') is-invalid @enderror" value="{{ old('pregunta', $ayuda->pregunta) }}">
                        @error('pregunta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="respuesta">Respuesta <b style="color: red">*</b></label>
                        <textarea class="form-control @error('respuesta') is-invalid @enderror" id="respuesta" name="respuesta">{{ old('respuesta', $ayuda->respuesta) }}</textarea>
                        @error('respuesta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('ayudaa') }}" class="btn btn-secondary">Cancelar</a>

                </form>
            </div>
        </div>
    </div>
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
