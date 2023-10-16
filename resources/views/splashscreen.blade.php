{{-- <!-- resources/views/splash.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <title>Cachorro PET</title>
    <!-- Agrega tus estilos CSS si es necesario -->
</head>
<body>
    <center>
        <div class="splash-container">
            <!-- Contenido de tu splash screen -->
            <br><br><br>
            <img src="{{ asset('img/load.gif') }}" width="250px" height="250px"  alt="loading">
    </center>
</body>
</html>

<!-- resources/views/splash.blade.php -->
<script>
    setTimeout(function() {
        window.location.href = "{{ route('inicio') }}"; // Reemplaza 'home' con el nombre de la ruta de tu página principal
    }, 3000); // Redirige después de 3 segundos (3000 milisegundos)
</script>
 --}}
