@extends('adminlte::page')

@section('title', 'Quienes Somos')

@section('content_header')
<h1>Configuración</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Quienes somos</h5>
    </div>
    <div class="card-body">

        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('somos.update', $somos->idconfiguracion) }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="mision">Mision <b style="color: red">*</b></label>
                        <textarea class="form-control" id="mision" name="mision">{{ $somos->mision }}</textarea>
                        <div class="invalid-feedback" id="mision-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="vision">Vision <b style="color: red">*</b></label>
                        <textarea class="form-control" id="vision" name="vision">{{ $somos->vision }}</textarea>
                        <div class="invalid-feedback" id="vision-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="valores">Valores <b style="color: red">*</b></label>
                        <textarea class="form-control" id="valores" name="valores">{{ $somos->valores }}</textarea>
                        <div class="invalid-feedback" id="valores-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="imgsomos">Imagen <b style="color: red">*</b></label>
                        <input type="file" class="form-control" id="imgsomos" name="imgsomos" accept="image/jpeg, image/png">
                        <div class="invalid-feedback" id="imgsomos-error"></div>
                        {{ $somos->imgsomos }}
                        <img src="{{ asset('imgconfig/'.$somos->imgsomos) }}" alt="{{ $somos->imgsomos }}" height="100px" width="100px" class="img-thumbnail">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('configuracion') }}" class="btn btn-secondary">Cancelar</a>

                </form>
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
        formValid = validarMision() && formValid;
        formValid = validarVision() && formValid;
        formValid = validarValores() && formValid;
        formValid = validarImagen() && formValid;

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
    const mision = document.getElementById('mision');
    const vision = document.getElementById('vision');
    const valores = document.getElementById('valores');
    const imagen = document.getElementById('imagen');

    // Agregamos event listeners para los campos que queremos validar
    mision.addEventListener('input', validarMision);
    vision.addEventListener('input', validarVision);
    valores.addEventListener('input', validarValores);
    imagen.addEventListener('change', validarImagen);

    // Funciones de validación para cada campo
    function validarMision() {
        if (mision.value.trim() === '') {
            mostrarError(mision, 'La mision es obligatoria.');
        } else {
            mostrarExito(mision);
        }
    }

    function validarVision() {
        if (vision.value.trim() === '') {
            mostrarError(vision, 'La vision es obligatoria.');
        } else {
            mostrarExito(vision);
        }
    }

    function validarValores() {
        if (valores.value.trim() === '') {
            mostrarError(valores, 'Los valores son obligatorios.');
        } else {
            mostrarExito(valores);
        }
    }

    function validarImagen() {
            if (imagen.value.trim() === '') {
                mostrarError(imagen, 'Debe seleccionar una imagen.');
            } else if (imagen.files[0].size > 10240 * 1024) {
                mostrarError(imagen, 'El tamaño máximo de la imagen es 10 MB.');
            } else if (!['image/jpeg', 'image/png'].includes(imagen.files[0].type)) {
                mostrarError(imagen, 'El archivo seleccionado debe ser una imagen (JPEG, PNG).');
            } else {
                mostrarExito(imagen);
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

