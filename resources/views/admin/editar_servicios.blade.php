@extends('adminlte::page')

@section('title', 'Configuracion')

@section('content_header')
<h1>Editar Servicio</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5 class="card-title"></h5>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="abs-center-registro">
                <form method="POST" action="{{ route('servicios.update', $services->idservicio) }}" class="border p-3 form-2" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="tipo">Nombre <b style="color: red">*</b></label>
                        <input type="text" name="tipo" id="tipo" class="form-control @error('tipo') is-invalid @enderror" value="{{ old('tipo', $services->tipo) }}">
                        <div class="invalid-feedback" id="tipo-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion <b style="color: red">*</b></label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion">{{ old('descripcion', $services->descripcion) }}</textarea>
                        <div class="invalid-feedback" id="descripcion-error"></div>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen:</label>
                        <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen" accept="image/jpeg, image/png">
                        {{ $services->imagen }}
                        <img src="{{ asset('imgservicios/' . $services->imagen) }}" alt="{{ $services->tipo }}" height="100px" width="100px" class="img-thumbnail">
                        <div class="invalid-feedback" id="imagen-error"></div>
                    </div>
                    

                    <button type="submit" class="btn btn-primary">Actualizar</button>
                    <a href="{{ route('services') }}" class="btn btn-secondary">Cancelar</a>

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
        formValid = validarTipo() && formValid;
        formValid = validarDescripcion() && formValid;
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
    const tipo = document.getElementById('tipo');
    const descripcion = document.getElementById('descripcion');
    const imagen = document.getElementById('imagen');

    // Agregamos event listeners para los campos que queremos validar
    tipo.addEventListener('input', validarTipo);
    descripcion.addEventListener('input', validarDescripcion);
    imagen.addEventListener('change', validarImagen);

    // Funciones de validación para cada campo
    function validarTipo() {
        if (tipo.value.trim() === '') {
            mostrarError(tipo, 'El Nombre del servicio es obligatorio.');
        } else {
            mostrarExito(tipo);
        }
    }

    function validarDescripcion() {
        if (descripcion.value.trim() === '') {
            mostrarError(descripcion, 'La Descripcion es obligatoria.');
        } else {
            mostrarExito(descripcion);
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
