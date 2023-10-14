@extends('principal') 

@section('title', 'Sin Conexión')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sin Conexión</div>

                <div class="card-body">
                    <h2>No hay conexión a internet.</h2>
                    <p>Por favor, verifica tu conexión a internet y vuelve a intentarlo.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
