<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Userr;
use Illuminate\Http\Request;

class RegisterrController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = new Userr;
        $user->nombre = $request->nombre;
        $user->apaterno = $request->nombre;
        $user->amaterno = $request->nombre;
        $user->telefono = $request->nombre;
        $user->correo = $request->correo;
        $user->direccion = $request->direccion;
        $user->nombre_usuario = $request->nombre_usuario;
        $user->contrasenia = bcrypt($request->contrasenia);
        $user->save();

        return redirect('/inicio');
    }
}
