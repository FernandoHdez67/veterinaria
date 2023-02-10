<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use app\Models\Usuario;
//App\Http\Controllers\Hash
use App\Http\Controllers\Hash;


class CuentasController extends Controller
{
    public function iniciarsesion()
    {
        return view('iniciarsesion');
    }

    public function registro()
    {
        return view('registro');
    }

    // public function store(Request $request)
    // {
    //     $user = Usuario::create([
    //         'nombre' => $request->input('nombre'),
    //         'apaterno' => $request->input('apaterno'),
    //         'amaterno' => $request->input('amaterno'),
    //         'telefono' => $request->input('telefono'),
    //         'correo' => $request->input('correo'),
    //         'direccion' => $request->input('direccion'),
    //         'nombre_usuario' => $request->input('nombre_usuario'),
    //         'contrasenia' => $request->input('contrasenia'),
    //     ]);

    //     return response()->json(['success' => true, 'user' => $user]);
    // }
}
