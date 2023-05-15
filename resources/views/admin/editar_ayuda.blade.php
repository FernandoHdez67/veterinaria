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
                        <div class="invalid-feedback" id="pregunta-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="respuesta">Respuesta <b style="color: red">*</b></label>
                        <textarea class="form-control @error('respuesta') is-invalid @enderror" id="respuesta" name="respuesta">{{ old('respuesta', $ayuda->respuesta) }}</textarea>
                        <div class="invalid-feedback" id="respuesta-error"></div>
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
<script>
    // Obtenemos el formulario y agregamos un event listener para validar los campos antes de enviar
    const formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(event) {
        // Prevenimos el envío del formulario para poder validar los campos
        event.preventDefault();

        // Validamos los campos del formulario
        let formValid = true;
        formValid = validarPregunta() && formValid;
        formValid = validarRespuesta() && formValid;

        // Verificamos si todos los campos son válidos
        if (formValid) {
            formulario.submit();
        } else {
            // Buscamos el primer campo que tenga un error de validación y mostramos el mensaje de error correspondiente
            let invalidField = formulario.querySelector('.is-invalid');
            invalidField.focus();
            mostrarError(invalidField, invalidField.nextElementSibling.innerHTML);
        }
    });



    // Obtenemos los elementos del formulario que necesitamos validar
    const pregunta = document.getElementById('pregunta');
    const respuesta = document.getElementById('respuesta');

    // Agregamos event listeners para los campos que queremos validar
    pregunta.addEventListener('input', validarPregunta);
    respuesta.addEventListener('input', validarRespuesta);

    // Funciones de validación para cada campo
    function validarPregunta() {
        if (pregunta.value.trim() === '') {
            mostrarError(pregunta, 'El pregunta es obligatoria.');
        } else {
            mostrarExito(pregunta);
        }
    }

    function validarRespuesta() {
        if (respuesta.value.trim() === '') {
            mostrarError(respuesta, 'El respuesta es obligatoria.');
        } else {
            mostrarExito(respuesta);
        }
    }


    // Función para mostrar un mensaje de error para un campo
    function mostrarError(campo, mensaje) {
        campo.classList.add('is-invalid');
        campo.nextElementSibling.innerHTML = mensaje;
        campo.nextElementSibling.style.display = 'block';
    }

    // Función para mostrar que un campo es válido
    function mostrarExito(campo) {
        campo.classList.remove('is-invalid');
        campo.nextElementSibling.innerHTML = '';
        campo.nextElementSibling.style.display = 'none';
    }

</script>
@stop
