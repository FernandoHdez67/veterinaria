@extends('principal')

@section('title',"Registro")

@section ('contenido')
<div class="container">
    <div class="abs-center-registro">
        <form method="POST" action="{{ route('registrar.usuario') }}" data-sitekey="6LeacA8lAAAAAIiAfvQQbcF5DTHDRfIkI7SsP4kG" class="border p-3 form-2">
            <center>
                <h5><b>Registro de Usuario</b></h5>
            </center> <br>
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre <b style="color: red">*</b></label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror">
                @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="apaterno">Apellido Paterno <b style="color: red">*</b></label>
                <input type="text" name="apaterno" id="apaterno" value="{{ old('apaterno') }}" class="form-control @error('apaterno') is-invalid @enderror">
                @error('apaterno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="amaterno">Apellido materno <b style="color: red">*</b></label>
                <input type="text" name="amaterno" id="amaterno" value="{{ old('amaterno') }}" class="form-control @error('amaterno') is-invalid @enderror">
                @error('amaterno')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="telefono">Telefono <b style="color: red">*</b></label>
                <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control  @error('amaterno') is-invalid @enderror">
                @error('telefono')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Correo <b style="color: red">*</b></label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('amaterno') is-invalid @enderror">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="necesidad">Dirección <b style="color: red">*</b></label>
                <textarea class="form-control  @error('direccion') is-invalid @enderror" name="direccion" value="" id="direccion">{{ old('direccion') }}</textarea>
                @error('direccion')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> <br>
            <div class="form-group">
                <label for="nombre_usuario">Nombre de Usuario <b style="color: red">*</b></label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario') }}" class="form-control  @error('nombre_usuario') is-invalid @enderror">
                @error('nombre_usuario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="preguntasecreta">Pregunta Secreta <b style="color: red">*</b></label>
                <select class="form-select" aria-label="Default select example" id="preguntasecreta" name="preguntasecreta">
                    <option selected>[Seleccionar]</option>
                    @foreach($pregunta as $pregunta)
                    <option value="{{ $pregunta->idpreguntasecreta }}">{{ $pregunta->preguntasecreta }}</option>
                    @endforeach
                </select> <br>
                <div class="form-group">
                    <label for="respuesta">Respuesta:</label>
                    <input type="text" id="respuesta" name="respuesta" class="form-control  @error('respuesta') is-invalid @enderror">
                    @error('respuesta')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="password">Contraseña <b style="color: red">*</b></label>
                <div class="password-container">
                    <input type="password" name="password" id="password" value="{{ old('password') }}" class="form-control  @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="toggle-password" onclick="togglePassword()">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="contrasenia">Confirmación de Contraseña</label>
                <div class="password-container">
                    <input type="password" name="confpassword" id="confpassword" value="{{ old('confpassword') }}" class="form-control  @error('confpassword') is-invalid @enderror">
                    @error('confpassword')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="toggle-password" onclick="togglePassword2()">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>

            <br>
            <div class="col">
                <input type="checkbox" class="form-check-input @error('politicas') is-invalid @enderror" name="politicas" id="politicas"> He leido y acepto todos los <a href="{{ route('politicas') }}">Términos y Condiciones</a>
                @error('politicas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> <br>
            <br>

            <center><button id="formulario-registro" type="submit" class="btn btn-rojopet">Registrar</button></center> <br>
            <center>¿Ya tienes cuenta? Inicia sesión <a href="<?= Route('iniciar')?>">Aquí</a></center>
    </div>
    </form>

</div>
<script>
    function togglePassword() {
        const passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

    function togglePassword2() {
        const passwordField = document.getElementById("confpassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

</script>
{{--<script>
    // Obtenemos el formulario y agregamos un event listener para validar los campos antes de enviar
    const formulario = document.querySelector('form');
    formulario.addEventListener('submit', function(event) {
        // Prevenimos el envío del formulario para poder validar los campos
        event.preventDefault();

        // Validamos los campos del formulario
        let formValid = true;
        formValid = validarNombre() && formValid;
        formValid = validarApaterno() && formValid;
        formValid = validarAmaterno() && formValid;
        formValid = validarTelefono() && formValid;
        formValid = validarDireccion() && formValid;
        formValid = ValidarRespuesta() && formValid;

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
    const apaterno = document.getElementById('apaterno');
    const amaterno = document.getElementById('amaterno');
    const email = document.getElementById('email');
    const telefono = document.getElementById('telefono');
    const direccion = document.getElementById('direccion');
    const respuesta = document.getElementById('respuesta');


    // Agregamos event listeners para los campos que queremos validar
    nombre.addEventListener('input', validarNombre);
    apaterno.addEventListener('input', validarApaterno);
    amaterno.addEventListener('input', validarAmaterno);
    telefono.addEventListener('input', validarTelefono);
    email.addEventListener('input', validarEmail); // Nuevo event listener
    direccion.addEventListener('input', validarDireccion);
    respuesta.addEventListener('input', validarRespuesta);


    // Funciones de validación para cada campo
    function validarNombre() {
        if (nombre.value.trim() === '') {
            mostrarError(nombre, 'El Nombre del producto es obligatorio.');
        } else {
            mostrarExito(nombre);
        }
    }

    function validarApaterno() {
        if (apaterno.value.trim() === '') {
            mostrarError(apaterno, 'El Apellido Paterno es obligatorio.');
        } else {
            mostrarExito(apaterno);
        }
    }

    function validarAmaterno() {
        if (amaterno.value.trim() === '') {
            mostrarError(amaterno, 'El Apellido Materno es obligatorio.');
        } else {
            mostrarExito(amaterno);
        }
    }

    function validarTelefono() {
        if (telefono.value.trim() === '') {
            mostrarError(telefono, 'El número de teléfono es obligatorio.');
        } else if (!/^\d{10}$/.test(telefono.value)) {
            mostrarError(telefono, 'El número de teléfono debe ser numerico y debe tener 10 dígitos.');
        } else {
            mostrarExito(telefono);
        }
    }

    function validarDireccion() {
        if (direccion.value.trim() === '') {
            mostrarError(direccion, 'La direccion es obligatoria.');
        } else {
            mostrarExito(direccion);
        }
    }


    function validarRespuesta() {
        if (respuesta.value.trim() === '') {
            mostrarError(respuesta, 'La Respuesta es obligatoria.');
        } else {
            mostrarExito(respuesta);
        }
    }


    function validarEmail() {
        const emailInput = email.value.trim();
        if (emailInput === '') {
            mostrarError(email, 'El correo electrónico es obligatorio.');
        } else if (!/\S+@\S+\.\S+/.test(emailInput)) {
            mostrarError(email, 'El correo electrónico no es válido.');
        } else {
            fetch('/check-email', {
                    method: 'POST'
                    , headers: {
                        'Content-Type': 'application/json'
                    }
                    , body: JSON.stringify({
                        email: emailInput
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        mostrarError(email, 'Este correo electrónico ya está registrado.');
                    } else {
                        // Si el correo electrónico no está registrado, se puede enviar el formulario
                        document.querySelector('#formulario-registro').submit();
                    }
                })
                .catch(error => console.error(error));
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

</script> --}}
</div>


@endsection
