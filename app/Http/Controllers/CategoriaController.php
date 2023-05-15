<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categorias(Request $request)
    {
        $texto = trim($request->get('texto'));
        $categoria = DB::table('tbl_categoria')
            ->select('idcategoria', 'categoria')
            ->where('categoria', 'LIKE', '%' . $texto . '%')
            ->paginate(30);

        return view('admin.admin_categoria', compact('categoria', 'texto'));
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
            'categoria.required' => 'La Categoria es obligatoria.',
        ];

        $request->validate([
            'categoria' => 'required|string',
        ], $messages);


        $categoria = Categoria::create([
            'categoria' => $request->categoria,
        ]);

        $categoria = Categoria::all();
        return view('admin.admin_categoria', compact('categoria'));
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
    public function edit($idcategoria)
    {
        $categoria = Categoria::findOrFail($idcategoria);
        return view('admin.editar_categoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $idcategoria)
    {
        $messages = [
            'categoria.required' => 'La categoria es obligatoria.',
        ];

        $request->validate([
            'categoria' => 'required|string',
        ], $messages);

        // Actualizamos el resto de los campos
        $idcategoria->categoria = $request->input('categoria');
        $idcategoria->save();

        return redirect()->route('categorias');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sf  $sf
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcategoria)
    {


        $categoria = Categoria::find($idcategoria);

        if (!$categoria) {
            abort(404);
        }

        // Eliminar la pregunta
        $categoria->delete();

        return redirect()->route('categorias');
    }
}
