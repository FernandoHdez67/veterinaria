@extends('principal')

@section('title',"Inicio | Cachorro PET")

@section ('contenido')
{{ Breadcrumbs::render('inicio') }}

<div class="container" style="margin-top: 15px">
    {{-- @if(session()->has('idusuario'))
    <h5 class="d-flex justify-content-end">Bienvenido de nuevo, {{ session('nombreUsuario') }}!</h5>
    @else
    <p></p>
    @endif --}}

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">

            @foreach($carrucel as $key => $imagen)
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" style="background-color: #E15116" aria-current="{{ $key == 0 ? 'true' : 'false' }}" aria-label="Slide {{ $key }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach($carrucel as $key => $imagen)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img src="{{ asset('imgcarrucel/' . $imagen->imagen) }}" class="d-block w-100" alt="...">
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" style="background-color: #E15116" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" style="background-color: #E15116" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <br><br>


</div> <br><br>

{{-- <center>
    <iframe src="https://www.google.com/maps/embed?pb=!1m12!1m8!1m3!1d1860.6009328858565!2d-98.4089551018524!3d21.14436331628205!3m2!1i1024!2i768!4f13.1!2m1!1sclinica%20veterinaria%20cachorro%20pet%20huejutla!5e0!3m2!1ses!2smx!4v1678522752873!5m2!1ses!2smx" width="330" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</center> --}}


    {{-- <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="4de9b006-20ff-4662-a907-7da749fc88e0" data-blockingmode="auto" type="text/javascript"></script>
    <script id="CookieDeclaration" src="https://consent.cookiebot.com/4de9b006-20ff-4662-a907-7da749fc88e0/cd.js" type="text/javascript" async></script> --}}
    <br><br>

    @endsection
