<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mystyle/mystyle.css') }}">
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="//code.tidio.co/jy4xt97e32ubz1nmeqqt4jyrjt1kvend.js" async></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="icon" href="{{ asset('img/icono.ico') }}">
    <script src="{{ asset('js/desactivarclickderecho.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#div-btn1').on('click', function() {
                $("#central").load('principal');
                return false;
            });
            ...
        });

    </script>
    <title>@yield('title')</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary" onclick="changeNavColor()">
        <div class="container-fluid">
            <a href="<?= Route('inicio') ?>"><img src="{{ asset('img/logocirculo.png') }}" width="50px" height="50px" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                        <a id="div-btn1" style="color: white" class="nav-link active" aria-current="page" href="<?= Route('inicio') ?>"><b><i class="fa-solid fa-house"></i> Inicio</b></a>
                    </li>
                    <li class="nav-item">
                        <a id="div-btn1" style="color: white" class="nav-link active" aria-current="page" href="<?= Route('somos') ?>"><b><i class="fa-solid fa-circle-info"></i> Quienes somos</b></a>
                    </li>
                    <li class="nav-item">
                        <a style="color: white" class="nav-link active" aria-current="page" href="{{ Route('productos') }}"><b><i class="fa-solid fa-shield-dog"></i> Productos</b></a>
                    </li>

                    <li class="nav-item">
                        <a id="div-btn1" style="color: white" class="nav-link active" aria-current="page" href="<?= Route('servicios') ?>"><b><i class="fa-solid fa-syringe"></i> Nuestros Servicios</b></a>
                    </li>

                    <li class="nav-item">
                        <a id="div-btn1" style="color: white" class="nav-link active" aria-current="page" href="<?= Route('citas') ?>"><b><i class="fa-regular fa-calendar-days"></i> Citas</b></a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a id="div-btn1" style="text-decoration: none; color:white" href="#"><img src="{{ asset('img/carrito.png') }}" width="30px" height="30px" alt=""><b style="margin-right: 10px"> Carrito</b></a>
                    <a id="div-btn1" class="btn btn-rojopet" href="<?= Route('iniciarsesion')?>"><b style="color: white"><i class="fa-solid fa-right-to-bracket"></i> Inciar Sesión</b></a>
                </form>
            </div>
        </div>
    </nav>



    <div class="col-sm-12">
        @yield('contenido')
    </div>

    <script src="//code.tidio.co/jy4xt97e32ubz1nmeqqt4jyrjt1kvend.js" async></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();

    </script>

</body>
<footer class="bg-dark text-white pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Cachorro PET</h3>
                <hr>
                <ul class="list-unstyled text-secondary">
                    <li><a class="text-decoration-none link-secondary" href="">Nosotros</a></li>
                    <li><a class="text-decoration-none link-secondary" href="">Quienes somos</a></li>
                    <li><a class="text-decoration-none link-secondary" href="">Politica de privacidad</a></li>
                </ul>

            </div>
            <div class="col-md-3">
                <h3>Contacto</h3>
                <hr>
                <ul class="list-unstyled text-secondary">
                    <li><i class="fa-brands fa-twitter"></i> <a class="text-decoration-none link-secondary" href="">Twitter</a></li>
                    <li><i class="fa-brands fa-square-facebook"></i> <a class="text-decoration-none link-secondary" href="">Facebook</a></li>
                    <li><i class="fa-brands fa-instagram"></i> <a class="text-decoration-none link-secondary" href="">Instagram</a></li>

            </div>
            <div class="col-md-3">
                <h3>Servicios</h3>
                <hr>
                <ul class="list-unstyled text-secondary">
                    <li><a class="text-decoration-none link-secondary" href="">Esterica canina</a></li>
                    <li><a class="text-decoration-none link-secondary" href="">Ultrasonido</a></li>
                    <li><a class="text-decoration-none link-secondary" href="">Cirugias</a></li>
                    <li><a class="text-decoration-none link-secondary" href="">Otros</a></li>
                </ul>
            </div>
            <div class="col-md-3">
                <h3>Dirección</h3>
                <hr>
                <ul class="list-unstyled text-secondary">

                    <li>
                    <li>Adolfo López Mateos 34
                        Aviación Civil
                        43000 Huejutla, Hgo.
                        México</li>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>

</html>
