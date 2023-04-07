<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('sesiones.iniciarsesion');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        } else {
            return back()->withErrors(['email' => 'Contraseña o correo invalido'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('iniciarsesion');
    }
}
