<?php

namespace App\Http\Controllers;

use App\Models\fs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Producto;

class ProductoController extends Controller
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
            ->select('idproducto', 'nombre', 'precio', 'tbl_categoria.categoria', 'tbl_marca.marca', 'cantidad', 'descripcion', 'imagen')
            ->leftJoin('tbl_categoria', 'tbl_productos.categoria', '=', 'tbl_categoria.idcategoria')
            ->leftJoin('tbl_marca', 'tbl_productos.marca', '=', 'tbl_marca.idmarca')
            ->where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('precio', 'LIKE', '%' . $texto . '%')
            ->orWhere('tbl_categoria.categoria', 'LIKE', '%' . $texto . '%')
            ->orWhere('tbl_marca.marca', 'LIKE', '%' . $texto . '%')
            ->orWhere('cantidad', 'LIKE', '%' . $texto . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombre', 'asc')
            ->paginate(30);

        $categoria = Categoria::all();
        $marca = Marca::all();

        return view('modulos.productos', compact('productos', 'categoria', 'marca', 'texto'));
    }


    public function buscar(Request $request)
    {
        $texto = trim($request->get('texto'));
        $ordenar = $request->get('ordenar');

        $categoria = Categoria::all();
        $marca = Marca::all();

        $productos = DB::table('tbl_productos')
            ->select('idproducto', 'nombre', 'precio', 'tbl_categoria.categoria', 'tbl_marca.marca', 'cantidad', 'descripcion', 'imagen')
            ->leftJoin('tbl_categoria', 'tbl_productos.categoria', '=', 'tbl_categoria.idcategoria')
            ->leftJoin('tbl_marca', 'tbl_productos.marca', '=', 'tbl_marca.idmarca')
            ->where('nombre', 'LIKE', '%' . $texto . '%')
            ->orWhere('precio', 'LIKE', '%' . $texto . '%')
            ->orWhere('tbl_categoria.categoria', 'LIKE', '%' . $texto . '%')
            ->orWhere('tbl_marca.marca', 'LIKE', '%' . $texto . '%')
            ->orWhere('cantidad', 'LIKE', '%' . $texto . '%')
            ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
            ->orderByRaw($ordenar === 'precio_asc' ? 'precio ASC' : 'precio DESC')
            ->paginate(30);

        return view('modulos.productos', compact('productos', 'texto', 'ordenar','categoria','marca'));
    }


    public function buscardos(Request $request)
    {
        $categoria = $request->input('categoria');
        $marca = $request->input('marca');

        // Realizar la consulta a la base de datos para obtener los productos
        // que correspondan a la categoría o marca seleccionada.
        $productos = Producto::when($categoria, function ($query, $categoria) {
            return $query->where('categoria', $categoria);
        })
            ->when($marca, function ($query, $marca) {
                return $query->where('marca', $marca);
            })
            ->get();

        $categoria = Categoria::all();
        $marca = Marca::all();
        // Retornar la vista con los resultados de la búsqueda.
        return view('modulos.productos', compact('productos', 'categoria', 'marca'));
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
     * @param  \App\Models\fs  $fs
     * @return \Illuminate\Http\Response
     */
    public function show(fs $fs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fs  $fs
     * @return \Illuminate\Http\Response
     */
    public function edit(fs $fs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fs  $fs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fs $fs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fs  $fs
     * @return \Illuminate\Http\Response
     */
    public function destroy(fs $fs)
    {
        //
    }
}
