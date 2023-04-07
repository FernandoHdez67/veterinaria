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
        
        <div class="container-fluid">
            <form class="d-flex" method="GET" action="{{ route('productos.buscar') }}" style="margin-top: 10px">
                <label class="me-2" for="ordenar">Ordenar por:</label>
                <select class="form-select form-select-sm me-2" id="ordenar" name="ordenar">
                    <option value="precio_asc">menor precio</option>
                    <option value="precio_desc">mayor precio</option>
                </select>
                <button type="submit" class="btn btn-rojopet">Ordenar</button>
            </form>
        </div>
        
          

    </nav> <br>

    @if(count($productos)<=0) <center>
        <h2>No se han encontrado resultados de su busqueda</h2>
        </center> <br><br><br><br><br><br>
        @else
        <center>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($productos as $productos)
                <div class="">
                    <div class="col hvr-glow">
                        <div class="card shadow-sm " style="width: 18rem;">
                            <img src="{{ 'imgproductos/'.$productos->imagen}}" class="card-img-top" alt="" width="300px" height="200px">
                            <div class="card-body">
                                <h5 class="card-title"><b>Nombre:</b> {{$productos->nombre}}</h5>
                                <p class="card-text"><b>Descripcion:</b> {{$productos->descripcion}}</p>
                                <p class="card-text"><b>$</b> {{$productos->precio}}</p>
                                <a id="div-btn1" href="{{ route('detalles', [$productos->idproducto]) }}" class="btn btn-rojopet">Detalles</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </center>
        @endif
</div>
</div> <br><br>
@endsection
