@extends('principal')

@section('title',"Carrito")

@section ('contenido')
{{ Breadcrumbs::render('ayuda') }}


<div class="container">
    <center>
        <div>
            <h2>El carrito de compras está vacio!!</h2>
        </div>
    </center>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection