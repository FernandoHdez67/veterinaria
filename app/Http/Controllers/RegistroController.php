<?php

namespace App\Http\Controllers;

use App\Models\fs;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use App\Models\ModelRegistro;

class RegistroController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    // public function index()
    // {
    //     $usuarios = ModelRegistro::orderBy('id','desc')->paginate(5);
    //     return view('sesiones.registro', compact('usuarios'));
    // }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('sesiones.registro');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apaterno' => 'required',
            'amaterno' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:tbl_usuarios,correo',
            'nombre_usuario' => 'required|unique:tbl_usuarios,nombre_usuario',
            'contrasenia' => 'required|min:8',
            'confcontrasenia' => 'required|same:contrasenia',
        ]);
        
        ModelRegistro::create($request->post());

        return redirect()->route('sesiones.registro')->with('success','Su registro ah sido Exitoso');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function show(ModelRegistro $usuarios)
    {
        return view('usuarios.show',compact('usuarios'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function edit(ModelRegistro $company)
    {
        return view('registro.edit',compact('usuarios'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\company  $company
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, ModelRegistro $usuarios)
    {
        $request->validate([
            'nombre' => 'required',
            'apaterno' => 'required',
            'amaterno' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:tbl_usuarios,correo',
            'nombre_usuario' => 'required|unique:tbl_usuarios,nombre_usuario',
            'contrasenia' => 'required|min:8',
            'confcontrasenia' => 'required|same:contrasenia',
        ]);
        
        $usuarios->fill($request->post())->save();

        return redirect()->route('sesiones.registro')->with('success','Company Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Company  $company
    * @return \Illuminate\Http\Response
    */
    public function destroy(ModelRegistro $usuarios)
    {
        $usuarios->delete();
        return redirect()->route('sesiones.registro')->with('success','Company has been deleted successfully');
    }
}



