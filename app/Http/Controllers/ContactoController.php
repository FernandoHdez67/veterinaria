<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviarCorreo(Request $request)
    {
        // dd($request->all());
        $datos = array(
            'nombre' => $request->input('nombre'),
            'correo' => $request->input('correo'),
            'mensaje' => $request->input('mensaje')
        );

        try {
            Mail::send('welcome', $datos, function ($message) {
                $message->from('fernando02.hdez@gmail.com', 'Fernando Hernandez');
                $message->to('fernando02.hdez@gmail.com')->subject('Nuevo mensaje de contacto');
            });
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['msg' => 'Ocurrió un error al enviar el correo. Por favor intenta de nuevo más tarde.']);
        }

        return view('welcome')->with('msg', 'Tu mensaje ha sido enviado.');
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
        //
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
