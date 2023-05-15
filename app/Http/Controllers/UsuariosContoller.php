<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use App\Models\PreguntaSecreta;
use Illuminate\Support\Str;


class UsuariosContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pregunta(Request $request)
    {
        $pregunta = PreguntaSecreta::all();
        return view('sesiones.registro', ['pregunta' => $pregunta]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    


    public function store(Request $request)
    {
        // dd($request->all());
        $messages = [
            'nombre.required' => 'El Nombre es obligatorio.',
            'nombre.string' => 'El nombre no debe incluir numeros.',
            'nombre.regex' => 'El nombre debe comenzar con una letra mayúscula y no debe contener números.',
            'apaterno.required' => 'El Apellido Paterno es obligatorio.',
            'apaterno.string' => 'El Apellido Paterno no debe incluir numeros.',
            'apaterno.regex' => 'El Apellido Paterno debe comenzar con una letra mayúscula y no debe contener números.',
            'amaterno.required' => 'El Apellido Materno es obligatorio.',
            'amaterno.string' => 'El Apellido Materno no debe incluir numeros.',
            'amaterno.regex' => 'El Apellido Materno debe comenzar con una letra mayúscula y no debe contener números.',
            'telefono.required' => 'El Teléfono es obligatorio.',
            'telefono.numeric' => 'El Teléfono debe ser numérico.',
            'telefono.digits' => 'El Numero de teléfono debe ser de 10 dígitos.',
            'email.required' => 'El Correo es obligatorio.',
            'email.email' => 'El Correo debe ser una dirección de correo válida.',
            'email.unique' => 'Este Correo ya existe.',
            'direccion.required' => 'La Dirección es obligatoria.',
            'nombre_usuario.required' => 'El nombre de usuario es obligatorio.',
            'nombre_usuario.unique' => 'El nombre de usuario ya existe.',
            'password.required' => 'La Contraseña es obligatoria.',
            'idpreguntasecreta.required' => 'Tienes que elegir una pregunta.',
            'respuesta' => 'La respuesta es obligatoria',
            'password.min' => 'la contraseña debe ser mayor a 8 caracteres',
            'confpassword.required' => 'La confirmacion de Contraseña es obligatoria.',
            'confpassword.min' => 'la contraseña debe ser mayor a 8 caracteres',
            'confpassword.same' => 'La contraseña no coincide con la primera.',
            'politicas.required' => 'Es necesario aceptar todos los terminos y condiciones ',
        ];

        $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[A-ZÁÉÍÓÚÜ][a-záéíóúü]+$/u',
            'apaterno' => 'required|string|max:255|regex:/^[A-ZÁÉÍÓÚÜ][a-záéíóúü]+$/u',
            'amaterno' => 'required|string|max:255|regex:/^[A-ZÁÉÍÓÚÜ][a-záéíóúü]+$/u',
            'telefono' => 'required|numeric|digits:10',
            'email' => 'required|email|max:255|unique:tbl_usuarios',
            'direccion' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:tbl_usuarios',
            'preguntasecreta' => 'required',
            'respuesta' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:tbl_usuarios',
            'password' => 'required|string|min:8',
            'confpassword' => 'required|string|min:8|same:password',
            'politicas' => 'required',
        ], $messages);


        $usuarios = Usuarios::create([
            'nombre' => $request->input('nombre'),
            'apaterno' => $request->input('apaterno'),
            'amaterno' => $request->input('amaterno'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'idpreguntasecreta' => $request->input('preguntasecreta'),
            'respuesta' => $request->input('respuesta'),
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(60), // Agregue el campo remember_token con un valor aleatorio

        ]);

        return view('sesiones.iniciar');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function show(sf $sf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function edit(sf $sf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sf $sf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function destroy(sf $sf)
    {
        //
    }
}
