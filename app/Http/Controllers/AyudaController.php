<?php

namespace App\Http\Controllers;

use App\Models\Ayuda;
use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AyudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function ayudamostrar(Request $request)
    {
        $texto = trim($request->get('texto'));
        $ayuda = DB::table('tbl_ayuda')
            ->select('idpregunta', 'pregunta', 'respuesta')
            ->where('pregunta', 'LIKE', '%' . $texto . '%')
            ->orWhere('respuesta', 'LIKE', '%' . $texto . '%')
            ->paginate(30);

        return view('modulos.ayuda', compact('ayuda', 'texto'));
    }

    public function adminayuda(Request $request)
    {
        $texto = trim($request->get('texto'));
        $ayuda = DB::table('tbl_ayuda')
            ->select('idpregunta', 'pregunta', 'respuesta')
            ->where('pregunta', 'LIKE', '%' . $texto . '%')
            ->orWhere('respuesta', 'LIKE', '%' . $texto . '%')
            ->paginate(30);

        return view('admin.admin_ayuda', compact('ayuda', 'texto'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'pregunta.required' => 'La pregunta es obligatoria.',
            'respuesta.required' => 'La respuesta es obligatoria.',
        ];
    
        $request->validate([
            'pregunta' => 'required|string',
            'respuesta' => 'required|string',
        ], $messages);


        $ayuda = Ayuda::create([
            'pregunta' => $request->pregunta,
            'respuesta' => $request->respuesta,
        ]);

        $ayuda = Ayuda::all();
        return view('admin.admin_ayuda', compact('ayuda'));
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
    public function edit($idpregunta)
    {
        $ayuda = Ayuda::findOrFail($idpregunta);
        return view('admin.editar_ayuda', compact('ayuda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ayuda $idpregunta)
{
    $messages = [
        'pregunta.required' => 'La pregunta es obligatoria.',
        'respuesta.required' => 'La respuesta es obligatoria.',
    ];

    $request->validate([
        'pregunta' => 'required|string',
        'respuesta' => 'required|string',
    ], $messages);

    // Actualizamos el resto de los campos
    $idpregunta->pregunta = $request->input('pregunta');
    $idpregunta->respuesta = $request->input('respuesta');
    $idpregunta->save();

    return redirect()->route('ayudaa');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpregunta)
    {


        $ayuda = Ayuda::find($idpregunta);

        if (!$ayuda) {
            abort(404);
        }

        // Eliminar la pregunta
        $ayuda->delete();

        return redirect()->route('ayudaa');



    }
}
