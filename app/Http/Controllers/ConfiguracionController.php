<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use App\Models\Configuracion;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class ConfiguracionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminsomos(Request $request)
    {
        $texto = trim($request->get('texto'));
        $somos = DB::table('tbl_configuracion')
            ->select('idconfiguracion', 'mision', 'vision', 'valores', 'imgsomos')
            ->where('mision', 'LIKE', '%' . $texto . '%')
            ->where('vision', 'LIKE', '%' . $texto . '%')
            ->where('valores', 'LIKE', '%' . $texto . '%')
            ->paginate(8);

        return view('admin.admin_config', compact('somos', 'texto'));
    }

    public function somos(Request $request)
{
    $texto = trim($request->get('texto'));
    $somos = DB::table('tbl_configuracion')
        ->select('idconfiguracion', 'mision', 'vision', 'valores', 'imgsomos')
        ->where('mision', 'LIKE', '%' . $texto . '%')
        ->where('vision', 'LIKE', '%' . $texto . '%')
        ->where('valores', 'LIKE', '%' . $texto . '%')
        ->first();

    return view('modulos.somos', compact('somos', 'texto'));
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
    public function edit($idconfigiracion)
    {
        $somos = Configuracion::findOrFail($idconfigiracion);
        return view('admin.editar_somos', compact('somos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Configuracion $idconfiguracion)
    {
        if ($request->hasFile('imgsomos')) {
            // Borramos la imagen anterior si existe
            if ($idconfiguracion->imgsomos) {
                Storage::delete('public/imgconfig/'.$idconfiguracion->imgsomos);
            }

            // Guardamos la nueva imagen en el sistema de archivos
            $imageName = time() . '.' . $request->file('imgsomos')->getClientOriginalExtension();
            $request->file('imgsomos')->move(public_path('imgconfig'), $imageName);
            $idconfiguracion->imgsomos = $imageName;
        }

        // Actualizamos el resto de los campos
        $idconfiguracion->mision = $request->input('mision');
        $idconfiguracion->vision = $request->input('vision');
        $idconfiguracion->valores = $request->input('valores');
        $idconfiguracion->save();

        return redirect()->route('configuracion');
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
