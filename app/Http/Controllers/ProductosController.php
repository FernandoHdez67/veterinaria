<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Muestra todos los productos en formato JSON
    public function index()
    {
        $productos = Producto::all();
        return $productos;
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria');
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marca');
    }

    public function productos()
    {
        $productos = Producto::with('categoria', 'marca')->get();
    
        $productosFormateados = [];
    
        foreach ($productos as $producto) {
            $imagenNombre = $producto->imagen; // Obtener el nombre de la imagen
            $imagenRuta = url('imgproductos/' . $imagenNombre); // Obtener la URL completa de la imagen
            $productoFormateado = [
                'idproducto' => $producto->idproducto,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'categoria' => Categoria::find($producto->categoria)->categoria, // Acceder al nombre de la categoría
                'marca' => Marca::find($producto->marca)->marca, // Acceder al nombre de la marca
                'cantidad' => $producto->cantidad,
                'descripcion' => $producto->descripcion,
                'imagen' => $imagenRuta,
            ];
            $productosFormateados[] = $productoFormateado;
        }
    
        // Devolver los productos formateados como respuesta
        return response()->json($productosFormateados);
    }
    





    //Muestra los productos por id
    public function getCategoriaxid($idproducto)
    {
        $productos = Producto::find($idproducto);
        if (is_null($productos)) {
            return response()->json(['Mensaje' => 'Registro no encontrado'], 404);
        }
        return response()->json($productos::find($idproducto), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //Insertar un nuevo producto
    public function store(Request $request)
    {
        $productos = new Producto();
        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->categoria = $request->categoria;
        $productos->marca = $request->marca;
        $productos->cantidad = $request->cantidad;
        $productos->descripcion = $request->descripcion;
        $productos->imagen = $request->imagen;


        $productos->save();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Actualizar un producto
    public function update(Request $request)
    {
        $productos = Producto::findOrFail($request->idproducto);
        $productos->nombre = $request->nombre;
        $productos->precio = $request->precio;
        $productos->categoria = $request->categoria;
        $productos->marca = $request->marca;
        $productos->cantidad = $request->cantidad;
        $productos->descripcion = $request->descripcion;
        $productos->imagen = $request->imagen;

        $productos->save();

        return $productos;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Eliminar un producto
    public function destroy(Request $request)
    {
        $productos = Producto::destroy($request->idproducto);
        return $productos;
    }
}
