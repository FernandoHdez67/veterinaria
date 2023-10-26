<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CarruselController extends Controller
{


    public function index()
    {
        $carrusels = Carrusel::all();
        $carruselFormateados = [];

        foreach ($carrusels as $carrusel) {
            $imagenNombre = $carrusel->imagen; // Obtener el nombre de la imagen
            $imagenRuta = url('imgcarrucel/' . $imagenNombre); // Obtener la URL completa de la imagen
            $carruselFormateado = [
                'imagen' => $imagenRuta,
            ];
            $carruselFormateados[] = $carruselFormateado;
        }

        // Devolver los servicios formateados como respuesta
        return response()->json($carruselFormateados);
    }
}
