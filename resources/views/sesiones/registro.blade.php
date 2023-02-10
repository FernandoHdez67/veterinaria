@extends('principal')

@section('title',"Registro")

@section ('contenido')
<div class="container">
    <div class="abs-center-registro">
        <form method="" class="border p-3 form-2">
            <center>
                <h5><b>Registro de Usuario</b></h5>
            </center> <br>
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre <b style="color: red">*</b></label>
                <input type="text" name="nombre" id="nombre" class="form-control">
            </div>
            <div class="form-group">
                <label for="apaterno">Apellido Paterno <b style="color: red">*</b></label>
                <input type="text" name="apaterno" id="apaterno" class="form-control">
            </div>
            <div class="form-group">
                <label for="amaterno">Apellido materno <b style="color: red">*</b></label>
                <input type="text" name="amaterno" id="amaterno" class="form-control">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono <b style="color: red">*</b></label>
                <input type="number" name="telefono" id="telefono" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Correo <b style="color: red">*</b></label>
                <input type="email" name="email" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="necesidad">Dirección <b style="color: red">*</b></label>
                <textarea class="form-control" name="direccion" id="direccion"></textarea>
            </div>
            <div class="form-group">
                <label for="nombreusuario">Nombre de Usuario <b style="color: red">*</b></label>
                <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control">
            </div>
            <label for="contrasenia">Contraseña <b style="color: red">*</b></label>
            <div class="password-container">
                <input type="password" name="contrasenia" id="contrasenia" class="form-control">
                <div class="toggle-password" onclick="togglePassword()">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <label for="contrasenia">Confirmación de Contraseña</label>
            <div class="password-container">
                <input type="password" name="confcontrasenia" id="confcontrasenia" class="form-control">
                <div class="toggle-password" onclick="togglePassword2()">
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <br>
            <div class="col">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required> He leido y acepto <a href="{{ 'modulos.politicas' }}">Las politicas de privacidad</a>
            </div> <br>
            <div class="col">
                <div class="g-recaptcha" data-sitekey="6LdpBlIjAAAAAAovCL8nR-TQMS9EoAEQFjk6g1N5"></div>
            </div>
            <br>

            <center><button type="submit" class="btn btn-rojopet">Registrar</button></center> <br>
            <center>¿Ya tienes cuenta? Inicia sesión <a href="<?= Route('iniciarsesion')?>">Aquí</a></center>
    </div>
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

    function togglePassword2() {
      const passwordField = document.getElementById("confcontrasenia");
      if (passwordField.type === "password") {
        passwordField.type = "text";
      } else {
        passwordField.type = "password";
      }
    }
  </script>
</div>


@endsection
