<?php

namespace App\Http\Controllers;

use App\Models\ServiciosModel;
use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Servicio;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio(Request $request)
    {
        $servicios = Servicio::all();
        return view('modulos.citas', ['tipo' => $servicios]);
    }

    public function servicios(Request $request)
    {
        $texto = trim($request->get('texto'));
        $servicios = DB::table('tbl_servicios')
            ->select('idservicio', 'tipo', 'descripcion', 'imagen')
            ->where('tipo', 'LIKE', '%' . $texto . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
            ->paginate(30);

        return view('modulos.servicios', compact('servicios', 'texto'));
    }

    public function adminservicios(Request $request)
    {
        $texto = trim($request->get('texto'));
        $services = DB::table('tbl_servicios')
            ->select('idservicio', 'tipo', 'descripcion', 'imagen')
            ->where('tipo', 'LIKE', '%' . $texto . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
            ->paginate(30);

        return view('admin.admin_servicios', compact('services', 'texto'));
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
        $messages = [
            'tipo.required' => 'El Nombre es obligatorio.',
            'tipo.max' => 'El Nombre no debe tener más de 255 caracteres.',
            'descripcion.max' => 'La Descripción no debe tener más de :max caracteres.',
            'imagen.required' => 'La Imagen es obligatoria.',
            'imagen.image' => 'El archivo seleccionado no es una imagen.',
            'imagen.max' => 'El archivo seleccionado no debe ser más grande de 10 MB.',
        ];
    
        $request->validate([
            'tipo' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:255',
            'imagen' => 'required|image|max:10240', // máximo 10 MB
        ], $messages);

        $imagen = $request->file('imagen');
        $nombre_imagen = uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('imgservicios'), $nombre_imagen);

        $services = ServiciosModel::create([
            'tipo' => $request->tipo,
            'descripcion' => $request->descripcion,
            'imagen' => $nombre_imagen,
        ]);

        $services = ServiciosModel::all();
        return view('admin.admin_servicios', compact('services'));
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
    public function edit($idservicio)
    {
        $services = ServiciosModel::findOrFail($idservicio);
        return view('admin.editar_servicios', compact('services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiciosModel $idservicio)
{
    $messages = [
        'tipo.required' => 'El Nombre es obligatorio.',
        'imagen.required' => 'La Imagen es obligatorio.',
        'imagen.image' => 'El archivo seleccionado debe ser una imagen.',
        'imagen.max' => 'El archivo seleccionado no debe ser más grande de 10 MB.',
    ];

    $request->validate([
        'tipo' => 'required|string',
        'descripcion' => 'required|string',
        'imagen' => 'image|max:10240', // máximo 10 MB
    ], $messages);

    if ($request->hasFile('imagen')) {
        // Borramos la imagen anterior si existe
        if ($idservicio->imagen) {
            Storage::delete('public/imgservicios/' . $idservicio->imagen);
        }

        // Guardamos la nueva imagen en el sistema de archivos
        $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
        $request->file('imagen')->move(public_path('imgservicios'), $imageName);
        $idservicio->imagen = $imageName;
    }

    // Actualizamos el resto de los campos
    $idservicio->tipo = $request->input('tipo');
    $idservicio->descripcion = $request->input('descripcion');
    $idservicio->save();

    return redirect()->route('services');
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function destroy($idservicio)
    {


        $services = ServiciosModel::find($idservicio);

        if (!$services) {
            abort(404);
        }

        // Eliminar la imagen asociada con el producto
        $imagen_path = public_path('imgservicios/' . $services->imagen);
        if (file_exists($imagen_path)) {
            unlink($imagen_path);
        }

        // Eliminar el producto
        $services->delete();

        return redirect()->route('services');



    }
}
