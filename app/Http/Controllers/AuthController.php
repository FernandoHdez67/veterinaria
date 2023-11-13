<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Models\Usuarios;
use App\Models\Carrucel;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('sesiones.iniciar');
    }


    public function login(Request $request)
    {
        $carrucel = Carrucel::all();
        $credentials = $request->only('email', 'password');

        $usuario = Usuarios::where('email', $credentials['email'])->first();

        if ($usuario && password_verify($credentials['password'], $usuario->password)) {
            $request->session()->regenerate();
            session(['idusuario' => $usuario->idusuario, 'nombreUsuario' => $usuario->nombre]); // Agrega el nombre de usuario

            return view('welcome', ['usuario' => $usuario], ['carrucel' => $carrucel]);
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }




    public function logout()
    {
        session()->forget('idusuario');
        return redirect()->route('iniciar');
    }
}
