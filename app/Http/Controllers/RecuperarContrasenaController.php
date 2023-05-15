<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuarios;
use App\Models\PreguntaSecreta;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Contracts\Mail\Mailable;
use App\Http\Controllers\RecuperarContrasena;
use App\Mail\RecuperarContrasenaMail;


class RecuperarContrasenaController extends Controller
{
    
    public function recuperar(Request $request)
    {
        $pregunta = PreguntaSecreta::all();
        return view('sesiones.recuperarcontrasena', ['pregunta' => $pregunta]);
    }


    public function enviarLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'respuesta' => 'required'
        ]);

        $usuario = Usuarios::where('email', $request->email)->where('respuesta', $request->respuesta)->first();

        if (!$usuario) {
            return back()->with('error', 'Los datos ingresados son incorrectos. Por favor, inténtelo de nuevo.');
        }

        $token = str::random(64);

        DB::table('password_resets')->insert([
            'email' => $usuario->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        
        Mail::to($usuario->email)->send(new RecuperarContrasenaMail($token));

        
        return back()->with('status', 'Se ha enviado un enlace a su correo electrónico para generar una nueva contraseña.');
    }

    public function nuevaContrasena($token)
    {
        $registro = DB::table('password_resets')->where('token', $token)->first();

        if (!$registro) {
            abort(404);
        }

        return view('recuperar-contrasena.nueva-contrasena', ['token' => $token]);
    }

    public function actualizarContrasena(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
            'token' => 'required'
        ]);

        $registro = DB::table('password_resets')->where('token', $request->token)->first();

        if (!$registro) {
            abort(404);
        }

        $usuario = Usuarios::where('email', $registro->email)->first();

        if (!$usuario) {
            return back()->with('error', 'El correo electrónico no está registrado en nuestra base de datos.');
        }

        $usuario->password = bcrypt($request->password);
        $usuario->save();

        DB::table('password_resets')->where('token', $request->token)->delete();

        return redirect()->route('iniciar')->with('status', 'La contraseña se ha actualizado correctamente. Por favor, inicie sesión con su nueva contraseña.');
    }
}
