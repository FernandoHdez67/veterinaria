<?php

namespace App\Http\Controllers;

use App\Models\fs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function productos(Request $request)
    {
        $texto=trim($request->get('texto'));
        $productos=DB::table('tbl_productos')
               ->select('idproducto','nombre','precio','cantidad','descripcion','imagen')
               ->where('nombre','LIKE','%'.$texto.'%')
               ->orWhere('precio','LIKE','%'.$texto.'%')
               ->orWhere('cantidad','LIKE','%'.$texto.'%')
               ->orWhere('descripcion','LIKE','%'.$texto.'%')
               ->orderBy('nombre','asc')
               ->paginate(30);
        return view('modulos.productos',compact('productos','texto'));
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
