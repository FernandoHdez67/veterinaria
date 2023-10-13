@extends('principal')

@section('title', "Inicio sesion")

@section('contenido')

<div class="container">
    <div class="abs-center-iniciodesesion">

        <form method="POST" action="{{ route('iniciar.sesion') }}" class="border p-3 form" id="login-form">
            @csrf
            <center><img src="{{ asset('img/user.png') }}" alt="" width="100px" height="100px"></center><br>
            <select class="form-select" id="sesion" name="sesion">
                <option value="tipo">[Elija un tipo]</option>
                <option value="Usuario">Usuario</option>
                <option value="Administrador">Administrador</option>
            </select>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required autofocus>
            </div>
            <div class="form-group">
                <label for="contrasenia">Contraseña</label>
                <div class="password-container">
                    <input type="password" name="password" id="contrasenia" class="form-control">
                    <div class="toggle-password" onclick="togglePassword()">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="recordar" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="recordar">
                        Recordar sesión
                    </label>
                </div>
            </div>
            <a href="{{ route('recuperar.contrasena') }}">¿Olvidé mi contraseña?</a><br>
            <center><button type="submit" class="btn btn-rojopet">Iniciar Sesión</button></center> <br>
            <center>¿Aún no tienes cuenta? <a href="{{ route('registro') }}">Regístrate</a></center>
        </form>

    </div>
</div>

<script>
    // Obtener el elemento select y su ID
    var selectElement = document.getElementById('sesion');
    var selectId = 'sesion';

    // Leer el valor del select del almacenamiento local
    var selectedOption = localStorage.getItem(selectId);

    // Si hay un valor almacenado, establecer la opción seleccionada
    if (selectedOption) {
        selectElement.value = selectedOption;
    }

    // Agregar un evento de cambio al elemento select
    selectElement.addEventListener('change', function() {
        var selectedOption = this.value;

        // Guardar el valor seleccionado en el almacenamiento local
        localStorage.setItem(selectId, selectedOption);

        if (selectedOption === 'Usuario') {
            // Redirige al formulario de usuario
            window.location.href = "{{ route('iniciar') }}";
        } else if (selectedOption === 'Administrador') {
            // Redirige al formulario de administrador
            window.location.href = "{{ route('iniciarsesion') }}";
        }
    });
</script>
<script>
    function togglePassword() {
        const passwordField = document.getElementById("contrasenia");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }

</script>

@endsection
