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
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <label for="nombre">Nombre <b style="color: red">*</b></label>
                    <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" class="form-control @error('nombre') is-invalid @enderror">
                    @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="apaterno">Apellido Paterno <b style="color: red">*</b></label>
                    <input type="text" name="apaterno" id="apaterno" value="{{ old('apaterno') }}" class="form-control @error('apaterno') is-invalid @enderror">
                    @error('apaterno')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="amaterno">Apellido materno <b style="color: red">*</b></label>
                    <input type="text" name="amaterno" id="amaterno" value="{{ old('amaterno') }}" class="form-control @error('amaterno') is-invalid @enderror">
                    @error('amaterno')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="telefono">Telefono <b style="color: red">*</b></label>
                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono') }}" class="form-control  @error('amaterno') is-invalid @enderror">
                    @error('telefono')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="email">Correo <b style="color: red">*</b></label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('amaterno') is-invalid @enderror">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="necesidad">Dirección <b style="color: red">*</b></label>
                    <textarea class="form-control  @error('direccion') is-invalid @enderror" name="direccion" value="" id="direccion">{{ old('direccion') }}</textarea>
                    @error('direccion')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="nombre_usuario">Nombre de Usuario <b style="color: red">*</b></label>
                    <input type="text" name="nombre_usuario" id="nombre_usuario" value="{{ old('nombre_usuario') }}" class="form-control  @error('nombre_usuario') is-invalid @enderror">
                    @error('nombre_usuario')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6 mb-3">
                    <label for="idpreguntasecreta">Pregunta Secreta <b style="color: red">*</b></label>
                    <select class="form-select" aria-label="Default select example" id="idpreguntasecreta" name="idpreguntasecreta">
                        <option selected>[Elegir]</option>
                        @foreach($pregunta as $pregunta)
                        <option value="{{ $pregunta->idpreguntasecreta }}">{{ $pregunta->preguntasecreta }}</option>
                        @endforeach
                    </select> <br>
                    <div class="form-group">
                        <label for="respuesta">Respuesta:</label>
                        <input type="text" name="respuesta" class="form-control  @error('respuesta') is-invalid @enderror">
                        @error('respuesta')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
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
                <div class="col-lg-6 mb-3">
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
            </div>
            <br>
            <div class="col">
                <input type="checkbox" class="form-check-input" id="exampleCheck1"> He leido y acepto <a href="{{ 'modulos.politicas' }}">Las politicas de privacidad</a>
            </div> <br>
            <br>

            <center><button type="submit" class="btn btn-rojopet">Registrar</button></center> <br>
            <center>¿Ya tienes cuenta? Inicia sesión <a href="<?= Route('iniciarsesion')?>">Aquí</a></center>
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
</div>


@endsection
