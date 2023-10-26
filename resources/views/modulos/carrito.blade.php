@extends('principal')

@section('title',"Carrito | Cachorro PET")

@section ('contenido')
{{ Breadcrumbs::render('ayuda') }}


<div class="container">
    <center>
        <div>
            <h2>El carrito de compras está vacio!!</h2>
            <a class="btn btn-" href="{{ route('productos') }}">Ver productos</a>
        </div>
    </center>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
