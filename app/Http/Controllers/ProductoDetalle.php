<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoDetalle extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productos(Request $request)
    {
        // $texto=trim($request->get('texto'));
        // $productos=DB::table('tbl_productos')
        //        ->select('idproducto','nombre','precio','cantidad','descripcion','imagen')
        //        ->where('nombre','LIKE','%'.$texto.'%')
        //        ->orWhere('precio','LIKE','%'.$texto.'%')
        //        ->orWhere('cantidad','LIKE','%'.$texto.'%')
        //        ->orWhere('descripcion','LIKE','%'.$texto.'%')
        //        ->orderBy('nombre','asc')
        //        ->paginate(30);
        // return view('modulos.detalle_producto',compact('productos','texto'));
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
