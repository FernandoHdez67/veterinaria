<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Productos;
use App\Models\ModelModulos;



class ModulosController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function citas(){
        return view('citas');
    }
    
    public function servicios(){
        return view('servicios');
    }

    public function somos(){
        return view('somos');
    }

}





