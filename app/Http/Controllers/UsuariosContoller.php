<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use App\Models\PreguntaSecreta;


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
            'apaterno.required' => 'El Apellido Paterno es obligatorio.',
            'amaterno.required' => 'El Apellido Materno es obligatorio.',
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
            'password.min'=>'la contraseña debe ser mayor a 8 caracteres',
            'confpassword.required' => 'La confirmacion de Contraseña es obligatoria.',
            'confpassword.min'=>'la contraseña debe ser mayor a 8 caracteres',
            'confpassword.same' => 'La contraseña no coincide con la primera.',
        ];
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apaterno' => 'required|string|max:255',
            'amaterno' => 'required|string|max:255',
            'telefono' => 'required|numeric|digits:10',
            'email' => 'required|email|max:255|unique:tbl_usuarios',
            'direccion' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:tbl_usuarios',
            'idpreguntasecreta' => 'required',
            'respuesta' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:tbl_usuarios',
            'password' => 'required|string|min:8',
            'confpassword'=> 'required|string|min:8|same:password',
        ], $messages);
        

        $usuarios = Usuarios::create([
            'nombre' => $request->input('nombre'),
            'apaterno' => $request->input('apaterno'),
            'amaterno' => $request->input('amaterno'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'direccion' => $request->input('direccion'),
            'nombre_usuario' => $request->input('nombre_usuario'),
            'idpreguntasecreta' => $request->input('idpreguntasecreta'),
            'respuesta' => $request->input('respuesta'),
            'password' => Hash::make($request->input('password')),

        ]);
        
        return view('sesiones.iniciarsesion');
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
