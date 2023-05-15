<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUsuarios;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('sesiones.iniciarsesion');
    }

    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $usuario = AdminUsuarios::where('email', $credentials['email'])->first();

        if ($usuario && password_verify($credentials['password'], $usuario->password)) {
            $request->session()->regenerate();
            session(['id' => $usuario->id]);

            return view('admin.dashboard', ['usuario' => $usuario]);
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas son incorrectas.',
        ]);
    }



    public function logout()
    {
        session()->forget('id');
        return redirect()->route('iniciarsesion');
    }
}
