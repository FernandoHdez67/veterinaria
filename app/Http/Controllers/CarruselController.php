<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrusel;
use Illuminate\Support\Facades\Storage;

class CarruselController extends Controller
{
    public function index()
    {
        $carrusels = Carrusel::all();

        // Recopilar rutas de imágenes
        $imagenes = [];
        foreach ($carrusels as $carrusel) {
            $imagenPath = 'imgcarrucel/' . $carrusel->imagen;
            $imagenUrl = Storage::url($imagenPath);
            $imagenes[] = $imagenUrl;
        }

        // Devolver las rutas de las imágenes como respuesta
        return response()->json(['imagenes' => $imagenes]);
    }
}
