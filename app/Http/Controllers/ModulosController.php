<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\ModelModulos;



class ModulosController extends Controller
{
 

    public function ayuda(){
        return view('ayuda');
    }

    public function carrito(){
        return view('carrito');
    }

}





