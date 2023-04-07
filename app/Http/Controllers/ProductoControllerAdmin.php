<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ProductoControllerAdmin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productos(Request $request)
    {
        $texto = trim($request->get('texto'));
        $productos = DB::table('tbl_productos')
            ->select('idproducto', 'nombre', 'precio', 'cantidad', 'descripcion', 'imagen')
            ->where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('precio', 'LIKE', '%' . $texto . '%')
            ->orWhere('cantidad', 'LIKE', '%' . $texto . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombre', 'asc')
            ->paginate(30);
        return view('admin.admin_productos', compact('productos', 'texto'));
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
            'precio' => 'required|numeric|min:0',
            'cantidad' => 'required|integer|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'required|image|max:10240', // máximo 10 MB
        ]);

        $imagen = $request->file('imagen');
        $nombre_imagen = uniqid() . '.' . $imagen->getClientOriginalExtension();
        $imagen->move(public_path('imgproductos'), $nombre_imagen);

        $producto = Producto::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'cantidad' => $request->cantidad,
            'descripcion' => $request->descripcion,
            'imagen' => $nombre_imagen,
        ]);

        $productos = Producto::all();
        return view('admin.admin_productos', compact('productos'));
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
    public function edit($idproducto)
    {
        $producto = Producto::findOrFail($idproducto);
        return view('admin.editar_producto', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $idproducto)
    {
        if ($request->hasFile('imagen')) {
            // Borramos la imagen anterior si existe
            if ($idproducto->imagen) {
                Storage::delete('public/imgproductos/' . $idproducto->imagen);
            }

            // Guardamos la nueva imagen en el sistema de archivos
            $imageName = time() . '.' . $request->file('imagen')->getClientOriginalExtension();
            $request->file('imagen')->move(public_path('imgproductos'), $imageName);
            $idproducto->imagen = $imageName;
        }

        // Actualizamos el resto de los campos
        $idproducto->nombre = $request->input('nombre');
        $idproducto->precio = $request->input('precio');
        $idproducto->cantidad = $request->input('cantidad');
        $idproducto->descripcion = $request->input('descripcion');
        $idproducto->save();

        return redirect()->route('products');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function destroy($idproducto)
    {


        $producto = Producto::find($idproducto);

        if (!$producto) {
            abort(404);
        }

        // Eliminar la imagen asociada con el producto
        $imagen_path = public_path('imgproductos/' . $producto->imagen);
        if (file_exists($imagen_path)) {
            unlink($imagen_path);
        }

        // Eliminar el producto
        $producto->delete();

        return redirect()->route('products');



    }
}
