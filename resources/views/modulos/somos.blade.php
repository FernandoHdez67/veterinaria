@extends('principal')

@section('title',"Quienes Somos | Cachorro PET")

@section ('contenido')
{{ Breadcrumbs::render('quienessomos') }}
<div class="container  my-5">

    <div class="row">
        <div class="col-6 bg-beige rounded-3">
            <h6><b>MISION</b></h6>
            <p>{{ $somos->mision }}</p>

            <h6><b>VISION</b></h6>
            <p>{{ $somos->vision }}</p>
            
            <h6><b>VALORES</b></h6>
            <p>{!! nl2br(e($somos->valores)) !!}</p>
        </div>
        <div class="col-6">
            <center> <img src="{{ asset('imgconfig/'.$somos->imgsomos) }}" class="img-thumbnail" alt="{{ $somos->imgsomos }}"></center>
        </div>

    </div> <br> <br> <br>
    <div class="row">
        <center>
            <div class="col-12">
                <h4>Facebook</h4>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FCachorroPetClinicaVeterinaria&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </div>
    </div>
    </center>

    @endsection
