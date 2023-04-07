<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use App\Models\Usuarios;
use App\Models\Carrucel;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('sesiones.iniciar');
    }


    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $usuario = Usuarios::where('email', $credentials['email'])->first();

        if ($usuario && password_verify($credentials['password'], $usuario->password)) {
            $request->session()->regenerate();
            session(['idusuario' => $usuario->idusuario]);

            return view('welcome', ['usuario' => $usuario]);
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }



    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('iniciar');
    }
}
