<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
use App\Models\PreguntaSecreta;
use Illuminate\Support\Facades\Hash;

class PerfilUsuario extends Controller
{
    public function editar()
    {
        $preguntas = PreguntaSecreta::all();
        $usuario = Usuarios::find(session('idusuario'));

        return view('modulos.editarperfil', ['usuario' => $usuario, 'preguntas' => $preguntas]);
    }

    public function actualizar(Request $request)
    {

        $usuario = Usuarios::find(session('idusuario'));

        $usuario->update([
            'nombre' => $request->input('nombre'),
            'apaterno' => $request->input('apaterno'),
            'amaterno' => $request->input('amaterno'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'idpreguntasecreta' => $request->input('idpreguntasecreta'),
            'respuesta' => $request->input('respuesta'),
            // Puedes manejar la actualización de la contraseña de manera especial si es necesario
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('perfilusuario.editar')->with('success', 'Perfil actualizado correctamente.');
    }
}
