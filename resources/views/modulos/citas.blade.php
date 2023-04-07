@extends('principal')

@section('title',"Citas")

@section ('contenido')
{{ Breadcrumbs::render('citas') }}

<div class="container">
    <form method="POST" action="{{ route('registro.citas') }}">
        @csrf
        <div class="row">
            <div class="col-lg-6 mb-3">
                <label for="nombre_mascota" class="form-label">Nombre de la mascota:</label>
                <input type="text" class="form-control @error('nombre_mascota') is-invalid @enderror" value="{{ old('nombre_mascota') }}" id="nombre_mascota" name="nombre_mascota">
                @error('nombre_mascota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="raza_mascota" class="form-label">Raza de la mascota:</label>
                <input type="text" class="form-control @error('raza_mascota') is-invalid @enderror" value="{{ old('raza_mascota') }}" id="raza_mascota" name="raza_mascota">
                @error('raza_mascota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="nombre_propietario" class="form-label">Nombre del propietario:</label>
                <input type="text" class="form-control @error('nombre_propietario') is-invalid @enderror" value="{{ old('nombre_propietario') }}" id="nombre_propietario" name="nombre_propietario">
                @error('nombre_propietario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="telefono_propietario" class="form-label">Teléfono del propietario:</label>
                <input type="text" class="form-control @error('telefono_propietario') is-invalid @enderror" value="{{ old('telefono_propietario') }}" id="telefono_propietario" name="telefono_propietario">
                @error('telefono_propietario')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="edad_mascota" class="form-label">Edad de la Mascota:</label>
                <input type="text" class="form-control @error('edad_mascota') is-invalid @enderror" value="{{ old('edad_mascota') }}" id="edad_mascota" name="edad_mascota">
                @error('edad_mascota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="sexo_mascota" class="form-label">Sexo de la Mascota:</label>
                <input type="text" class="form-control @error('sexo_mascota') is-invalid @enderror" value="{{ old('sexo_mascota') }}" id="sexo_mascota" name="sexo_mascota">
                @error('sexo_mascota')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="fecha_cita" class="form-label">Fecha de la cita:</label>
                <input type="date" class="form-control @error('fecha_cita') is-invalid @enderror" value="{{ old('fecha_cita') }}" id="fecha_cita" name="fecha_cita">
                @error('fecha_cita')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-lg-6 mb-3">
                <label for="hora_cita" class="form-label">Hora de la cita:</label>
                <input type="time" class="form-control @error('hora_cita') is-invalid @enderror" value="{{ old('hora_cita') }}" id="hora_cita" name="hora_cita">
                @error('hora_cita')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-12 mb-3">
                <label for="razon_cita" class="form-label">Razon de la cita:</label>
                <textarea class="form-control @error('tipo') is-invalid @enderror" value="" id="razon_cita" name="razon_cita" rows="4">{{ old('razon_cita') }}</textarea>
                @error('razon_cita')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-rojopet">Registrar cita</button>
    </form>
</div> <br><br>



@endsection
