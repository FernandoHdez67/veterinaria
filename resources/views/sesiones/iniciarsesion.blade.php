@extends('principal')

@section('title',"Inicio de Sesion")

@section ('contenido')

<div class="container">
    <div class="abs-center-iniciodesesion">

        <form action="#" class="border p-3 form">
            <center><img src="{{ asset('img/user.png') }}" alt="" width="100px" height="100px"></center> <br>
            <div class="form-group">
                <label for="usuario">Correo</label>
                <input type="email" name="correo" id="correo" class="form-control" required>
            </div>
            <label for="contrasenia">Contraseña</label>
            <div class="password-container">
                <input type="password" name="contrasenia" id="contrasenia" class="form-control">
                <div class="toggle-password" onclick="togglePassword()">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <a href="#">¿Olvidé mi contraseña?</a> <br>
            <center><button type="submit" class="btn btn-rojopet">Iniciar Sesión</button></center> <br>
    <center>¿Aun no tienes cuenta? <a href="<?= Route('registro')?>">Registrate</a></center>
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
