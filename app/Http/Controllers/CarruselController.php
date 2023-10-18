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
        $imagenesPath = public_path('imgcarrucel');
        $imagenes = [];

        // Obtener la lista de archivos en el directorio
        $archivos = File::files($imagenesPath);

        // Obtener las URLs de las imágenes
        foreach ($archivos as $archivo) {
            $imagenes[] = url('imgcarrucel/' . $archivo->getFilename());
        }

        // Devolver las rutas de las imágenes como respuesta
        return response()->json(['imagenes' => $imagenes]);
    }
}
