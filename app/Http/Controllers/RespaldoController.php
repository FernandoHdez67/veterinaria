<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ZipArchive;
use App\Models\Respaldo;
use Illuminate\Support\Facades\DB;
use mysqli;


class RespaldoController extends Controller
{
    public function index()
    {
        return view('admin.basededatos');
    }

    public function backup()
    {
        $host = "localhost";
        $nombre = "bd_veterinaria";
        $usuario = "root";
        $password = "";
        $fecha = date('Ymd_His');

        $nombre_sql = $nombre . '_' . $fecha . '.sql';

        $dump = "mysqldump --host=$host --user=$usuario --password=$password $nombre > $nombre_sql";
        exec($dump);

        $zip = new ZipArchive();

        $nombre_zip = $nombre . '_' . $fecha . '.zip';

        if ($zip->open($nombre_zip, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($nombre_sql);
            $zip->close();
            unlink($nombre_sql);
            header("Location: $nombre_zip");
            exit();
        }
    }



    public function restore(Request $request)
    {
        // Validar que se haya subido un archivo
        $request->validate([
            'backup_file' => 'required|mimes:sql'
        ]);

        // Obtener el archivo subido por el usuario
        $backup_file = $request->file('backup_file');

        // Obtener los datos de conexión a la base de datos
        $host = env('DB_HOST');
        $database = env('DB_DATABASE');
        $username = env('DB_USERNAME');
        $password = env('DB_PASSWORD');

        // Leer el contenido del archivo de respaldo
        $contents = file_get_contents($backup_file->getRealPath());

        // Conectarse a la base de datos y ejecutar el contenido del archivo
        $mysqli = new mysqli($host, $username, $password, $database);
        $mysqli->multi_query($contents);
        $mysqli->close();

        // Redirigir al usuario a la vista anterior con un mensaje de éxito
        return back()->with('success', 'La base de datos ha sido restaurada exitosamente.');
    }


    public function eliminarBD()
    {
        $host = "localhost";
        $usuario = "root";
        $password = "";

        $conexion = mysqli_connect($host, $usuario, $password);
        $sql = "DROP DATABASE IF EXISTS bd_veterinaria";
        mysqli_query($conexion, $sql);

        return redirect('/')->with('success', 'Base de datos eliminada correctamente');
    }
}
