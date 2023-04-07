@extends('principal')

@section('title',"Inicio de Sesion")

@section ('contenido')

<div class="container">
    <div class="abs-center-iniciodesesion">

        <form method="POST" action="{{ route('login') }}" class="border p-3 form">
            @csrf
            <center><img src="{{ asset('img/user.png') }}" alt="" width="100px" height="100px"></center> <br>
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
            <a href="{{ route('password.request') }}">¿Olvidé mi contraseña?</a><br>
            <center><button type="submit" class="btn btn-rojopet">Iniciar Sesión</button></center> <br>
            <center>¿Aun no tienes cuenta? <a href="{{ route('registro') }}">Registrate</a></center>
    </div>
    <br>
    </form>

</div>


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
</div>

@endsection
