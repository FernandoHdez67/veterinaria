@extends('principal')

@section('title',"Quienes Somos")

@section ('contenido')
{{ Breadcrumbs::render('quienessomos') }}
<div class="container  my-5">

    <div class="row">
        <div class="col-6 bg-beige rounded-3">
            <h6><b>MISION</b></h6>
            <p>
                Somos una fundación donde su actuación y servicios se
                fundamentan en fortalecer integralmente a la persona con discapacidad,
                para que logren una vida plena, digna y feliz.
            </p>
            <h6><b>VISION</b></h6>
            <p>
                Ser una fundación lider en la Región Huasteca en dar apoyo
                económico, moral y acompañamiento para la inclusión integral
                de las personas con discapacidad
            </p>
            <h6><b>VALORES</b></h6>
            <p>
                - Empatia <br>
                - Honestidad <br>
                - Solidaridad <br>
            </p>
        </div>
        <div class="col-6">
            <center> <img src="{{ asset('img/imagen1.jpg') }}" class="img-thumbnail" alt="..."></center>
        </div>

    </div> <br> <br> <br>
    <div class="row">
        <center>
            <div class="col-12">
                <h4>Facebook</h4>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCachorroPetClinicaVeterinaria&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>            </div>
    </div>
    </center>

@endsection