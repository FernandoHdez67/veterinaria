@extends('principal')

@section('title',"Inicio de Sesion")

@section ('contenido')

<div class="container">
    <div class="abs-center-iniciodesesion">
        <form method="POST" action="{{ route('login') }}" class="border p-3 form" id="login-form">
            @csrf
            <center><img src="{{ asset('img/user.png') }}" alt="" width="100px" height="100px"></center> <br>
            {{-- <i class="fa-brands fa-google fa-xl" style="color: #293f66;"></i> --}}
            {{-- <center><a style="text-decoration: none" href="/login-google"><br>Inciar sesion con Google</a></center> <br> --}}
            <select class="form-select" id="sesion" name="sesion">
                <option value="tipo">[Elija un tipo]</option>
                <option value="Usuario">Usuario</option>
                <option value="Administrador">Administrador</option>
            </select>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control  @error('email') is-invalid @enderror" >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="contrasenia">Contraseña</label>
                <div class="password-container">
                    <input type="password" name="password" id="contrasenia" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="toggle-password" onclick="togglePassword()">
                        <i class="fa fa-eye"></i>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        Recordar sesión
                    </label>
                </div>
            </div>
            <a href="{{ route('password.request') }}">¿Olvidé mi contraseña?</a><br> <br>
            <center><button type="submit" class="btn btn-rojopet">Iniciar Sesión</button></center> <br>
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

</div>

@endsection
