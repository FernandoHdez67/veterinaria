<?php

namespace App\Http\Controllers;

use App\Models\CarrucelModel;
use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Carrucel;
use Illuminate\Support\Facades\Storage;

class CarrucelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function carrucel()
    {
        $carrucel = Carrucel::all();

        if (auth()->check()) {
            $usuario = auth()->user();
            return view('welcome', compact('carrucel', 'usuario'));
        }

        return view('welcome', compact('carrucel'));
    }


    public function admincarrucel(Request $request)
    {
        $texto = trim($request->get('texto'));
        $carrucel = DB::table('tbl_carrucel')
            ->select('idimagen', 'nombre', 'imagen')
            ->where('nombre', 'LIKE', '%' . $texto . '%')
            ->paginate(30);

        return view('admin.admin_carrucel', compact('carrucel', 'texto'));
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
        $request->validate([
            'nombre' => 'required|string|max:255',
            'imagen' => 'required|image|max:10240', // máximo 10 MB
        ]);

        $imagen = $request->file('imagen');
        $nombre_imagen = uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('imgcarrucel'), $nombre_imagen);

        $carrucel = Carrucel::create([
            'nombre' => $request->nombre,
            'imagen' => $nombre_imagen,
        ]);

        $carrucel = Carrucel::all();
        return view('admin.admin_carrucel', compact('carrucel'));
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
    public function edit($idimagen)
    {
        $carrucel = Carrucel::findOrFail($idimagen);
        return view('admin.editar_carrucel', compact('carrucel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrucel $idimagen)
    {
        if ($request->hasFile('imagen')) {
            // Borramos la imagen anterior si existe
            if ($idimagen->imagen) {
                Storage::delete('public/imgcarrucel/' . $idimagen->imagen);
            }

            // Guardamos la nueva imagen en el sistema de archivos
            $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('imgcarrucel'), $imageName);
            $idimagen->imagen = $imageName;
        }

        // Actualizamos el resto de los campos
        $idimagen->nombre = $request->input('nombre');
        $idimagen->save();

        return redirect()->route('carruseladmin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function destroy($idimagen)
    {


        $carrucel = Carrucel::find($idimagen);

        if (!$carrucel) {
            abort(404);
        }

        // Eliminar la imagen asociada con el producto
        $imagen_path = public_path('imgcarrucel/' . $carrucel->imagen);
        if (file_exists($imagen_path)) {
            unlink($imagen_path);
        }

        // Eliminar el producto
        $carrucel->delete();

        return redirect()->route('carruseladmin');
    }


    public function eliminarVarios(Request $request)
    {
        $idimagen = $request->input('eliminar', []);

        if (empty($idimagen)) {
            return back()->with('error', 'No se han seleccionado imágenes para eliminar.');
        }

        $imagenes = Carrucel::whereIn('idimagen', $idimagen)->get();

        foreach ($imagenes as $imagen) {
            $ruta_imagen = public_path('imgcarrucel') . '/' . $imagen->imagen;
            if (file_exists($ruta_imagen)) {
                unlink($ruta_imagen);
            }
            $imagen->delete();
        }

        return redirect()->route('carruseladmin');
    }
}
