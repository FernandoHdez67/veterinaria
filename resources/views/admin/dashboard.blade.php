@extends('adminlte::page')

@section('title', 'Tablero')

@section('content_header')
<h1>Tablero</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <h5>Calendario</h5>
    </div>
    <div class="card-body">
        <!-- Modal para mostrar información de la cita -->
        <div class="modal fade" id="citaModal" tabindex="-1" aria-labelledby="citaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="citaModalLabel">Información de la cita</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>Nombre de la mascota:</strong> <span id="mascota"></span></p>
                        <p><strong>Raza de la mascota:</strong> <span id="raza"></span></p>
                        <p><strong>Nombre del propietario:</strong> <span id="propietario"></span></p>
                        <p><strong>Teléfono del propietario:</strong> <span id="telefono"></span></p>
                        <p><strong>Edad de la mascota:</strong> <span id="edad"></span> años</p>
                        <p><strong>Sexo de la mascota:</strong> <span id="sexo"></span></p>
                        <p><strong>Fecha de la cita:</strong> <span id="fecha"></span></p>
                        <p><strong>Hora de la cita:</strong> <span id="hora"></span></p>
                        <p><strong>Razón de la cita:</strong> <span id="razon"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Calendario -->

        <div id='calendar'>
            
        </div>

    </div>


</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
