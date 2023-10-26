@extends('principal')

@section('title',"Contacto | Cachorro PET")

@section ('contenido')
{{ Breadcrumbs::render('contacto') }}


<div class="container">
    
        <div>
            <form action="{{ route('enviar') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}" id="nombre" name="nombre">
                    <div class="invalid-feedback" id="nombre-error"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="email" class="form-control @error('correo') is-invalid @enderror" value="{{ old('correo') }}" id="correo" name="correo">
                    <div class="invalid-feedback" id="correo-error"></div>
                </div>
                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario:</label>
                    <textarea class="form-control @error('mensaje') is-invalid @enderror" value="{{ old('mensaje') }}" id="mensaje" name="mensaje" rows="5"></textarea>
                    <div class="invalid-feedback" id="mensaje-error"></div>
                </div>
                <button type="submit" class="btn btn-rojopet hvr-grow">Enviar comentario</button> <br><br>
            </form>
        </div>
        <center>
            <div id="map"></div>
        </center>
        <script src="{{ asset('js/GoogleMaps/googlemaps.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('mystyle/googlemaps.css') }}">
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDs5yI1WmjnMQlJV7rnw-hCtTaiHFCb0K4&callback=iniciarMap()"></script>
        
</div>

<br><br><br><br><br><br><br><br><br><br>
@endsection

<script>
    // Obtenemos el formulario y agregamos un event listener para validar los campos antes de enviar
    const formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(event) {
        // Prevenimos el envío del formulario para poder validar los campos
        event.preventDefault();

        // Validamos los campos del formulario
        let formValid = true;
        formValid = validarNombre() && formValid;
        formValid = validarCorreo() && formValid;
        formValid = validarMensaje() && formValid;

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
    const nombre = document.getElementById('nombre');
    const correo = document.getElementById('correo');
    const mensaje = document.getElementById('mensaje');

    // Agregamos event listeners para los campos que queremos validar
    nombre.addEventListener('input', validarNombre);
    correo.addEventListener('input', validarCorreo);
    mensaje.addEventListener('input', validarMensaje);

    // Funciones de validación para cada campo
    function validarNombre() {
        if (nombre.value.trim() === '') {
            mostrarError(nombre, 'El Nombre del producto es obligatorio.');
        } else {
            mostrarExito(nombre);
        }
    }

    function validarEmail() {
        const emailInput = correo.value.trim();
        if (emailInput === '') {
            mostrarError(correo, 'El correo electrónico es obligatorio.');
        } else if (!/\S+@\S+\.\S+/.test(emailInput)) {
            mostrarError(correo, 'El correo electrónico no es válido.');
        } else {
            mostrarExito(correo);
        }
    }

    function validarMensaje() {
        if (mensaje.value.trim() === '') {
            mostrarError(mensaje, 'El mensaje es obligatorio.');
        } else {
            mostrarExito(mensaje);
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
