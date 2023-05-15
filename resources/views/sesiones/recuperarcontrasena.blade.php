@extends('principal')

@section('title',"Recuperacion de contraseña")

@section ('contenido')
<div class="container" style="margin-top: 20px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <center><div class="card-header">{{ __('Recuperar contraseña') }}</div></center>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('recuperar-contrasena.enviarLink') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> 
                        </div><br>

                        <div class="form-group row">
                            <label for="pregunta_secreta" class="col-md-4 col-form-label text-md-right">{{ __('Pregunta secreta') }}</label>

                            <div class="col-md-6">
                                <select id="pregunta_secreta" class="form-control @error('pregunta_secreta') is-invalid @enderror" name="pregunta_secreta" required>
                                    <option selected>[Seleccionar]</option>
                                    @foreach($pregunta as $pregunta)
                                    <option value="{{ $pregunta->idpreguntasecreta }}">{{ $pregunta->preguntasecreta }}</option>
                                    @endforeach
                                </select>

                                @error('pregunta_secreta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div> 
                        </div><br>

                        <div class="form-group row">
                            <label for="respuesta" class="col-md-4 col-form-label text-md-right">{{ __('Respuesta') }}</label>

                            <div class="col-md-6">
                                <input id="respuesta" type="text" class="form-control @error('respuesta') is-invalid @enderror" name="respuesta" value="{{ old('respuesta') }}" required>

                                @error('respuesta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div> <br>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <br><br><br><br><br><br><br>
@endsection
