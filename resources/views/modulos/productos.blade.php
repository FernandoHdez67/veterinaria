@extends('principal')

@section('title',"Productos")

@section ('contenido')
{{ Breadcrumbs::render('productos') }}
<div class="container">

        <nav class="navbar navbar-light ">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                <form class="d-flex" action="" method="get" style="margin-top: 10px">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="texto">
                    <button class="btn btn-rojopet" type="submit">Buscar</button>
                </form>
            </div>
        </nav> <br>

    @if(count($productos)<=0) <center><h2>No se han encontrado resultados de su busqueda</h2></center> <br><br><br><br><br><br>
        @else
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach ($productos as $productos)
            <div class="hvr-grow">
                <div class="col">
                    <div class="card shadow-sm" style="width: 18rem;">
                        <img src="{{ 'imgproductos/'.$productos->imagen}}" class="card-img-top" alt="" width="300px" height="200px">
                        <div class="card-body">
                            <h5 class="card-title"><b>Nombre:</b> {{$productos->nombre}}</h5>
                            <p class="card-text"><b>Descripcion:</b> {{$productos->descripcion}}</p>
                            <p class="card-text"><b>$</b> {{$productos->precio}}</p>
                            <a href="#" class="btn btn-rojopet">Detalles</a>
                        </div>
                    </div>
            </div>
            </div>

            @endforeach
        </div>
        @endif
</div>
</div> <br><br>
@endsection
