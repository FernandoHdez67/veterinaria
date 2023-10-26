@extends('principal')

@section('title',"Servicios | Cachorro PET")

@section ('contenido')
{{ Breadcrumbs::render('servicios') }}

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <center>
        <div class="col-md-6">
            <form action="{{ route('enviar') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo:</label>
                    <input type="email" class="form-control" id="correo" name="correo" required>
                </div>
                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario:</label>
                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-rojopet hvr-grow">Enviar comentario</button> <br><br>
            </form>
        </div>
    </center>
</div>
</div> <br><br>
@endsection
