<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use App\Models\AdminUsuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegistroAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registro(Request $request)
    {
        return view('sesiones.registroadmin');
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
            'email.required' => 'El Correo es obligatorio.',
            'email.email' => 'El Correo debe ser una dirección de correo válida.',
            'email.unique' => 'Este Correo ya existe.',
            'password.required' => 'La Contraseña es obligatoria.',
            'password.min' => 'la contraseña debe ser mayor a 8 caracteres',
            'confpassword.required' => 'La confirmacion de Contraseña es obligatoria.',
            'confpassword.min' => 'la contraseña debe ser mayor a 8 caracteres',
            'confpassword.same' => 'La contraseña no coincide con la primera.',
        ];

        $request->validate([
            'nombre' => 'required|string|max:255|regex:/^[A-ZÁÉÍÓÚÜ][a-záéíóúü]+$/u',
            'email' => 'required|email|max:255|unique:tbl_usuarios',
            'password' => 'required|string|min:8',
            'confpassword' => 'required|string|min:8|same:password',
        ], $messages);


        $usuarios = AdminUsuarios::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(60), // Agregue el campo remember_token con un valor aleatorio

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
