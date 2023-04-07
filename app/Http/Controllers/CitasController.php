<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Citas;


class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function citas(Request $request)
    {
        $texto = trim($request->get('texto'));
        $citas = DB::table('tbl_citas')
            ->select('id', 'nombre_mascota', 'raza_mascota', 'nombre_propietario', 'telefono_propietario', 'edad_mascota', 'sexo_mascota', 'fecha_cita', 'hora_cita', 'razon_cita')
            ->where('nombre_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('raza_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('nombre_propietario', 'LIKE', '%' . $texto . '%')
            ->orWhere('telefono_propietario', 'LIKE', '%' . $texto . '%')
            ->orWhere('edad_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('sexo_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('fecha_cita', 'LIKE', '%' . $texto . '%')
            ->orWhere('hora_cita', 'LIKE', '%' . $texto . '%')
            ->orWhere('razon_cita', 'LIKE', '%' . $texto . '%')
            ->orderBy('nombre_mascota', 'asc')
            ->paginate(30);

        return view('admin.admin_citas', compact('citas', 'texto'));
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
            
        'nombre_mascota.required' => 'El nombre de la mascota es obligatorio',
        'nombre_mascota.string' => 'El nombre de la mascota debe ser texto',
        'raza_mascota.required' => 'La raza de la mascota es obligatoria',
        'raza_mascota.string' => 'La raza de la mascota debe ser texto',
        'nombre_propietario.required' => 'El nombre del propietario es obligatorio',
        'nombre_propietario.string' => 'El nombre del propietario debe ser texto',
        'telefono_propietario.required' => 'El teléfono del propietario es obligatorio',
        'telefono_propietario.numeric' => 'El teléfono del propietario debe ser numerico',
        'edad_mascota.required' => 'La edad de la mascota es obligatoria',
        'edad_mascota.integer' => 'La edad de la mascota debe ser un número entero',
        'edad_mascota.min' => 'La edad de la mascota no debe ser negativa',
        'sexo_mascota.required' => 'El sexo de la mascota es obligatorio',
        'sexo_mascota.string' => 'El sexo de la mascota debe ser una cadena de texto',
        'sexo_mascota.in' => 'El sexo de la mascota debe ser Hembra o Macho',
        'fecha_cita.required' => 'La fecha de la cita es obligatoria',
        'fecha_cita.date' => 'La fecha de la cita debe ser una fecha válida',
        'hora_cita.required' => 'La hora de la cita es obligatoria',
        'hora_cita.regex' => 'La hora de la cita debe tener el formato HH:MM',
        'razon_cita.required' => 'La razón de la cita es obligatoria',
        ];

        $request->validate([
            'nombre_mascota' => 'required|string|max:255',
            'raza_mascota' => 'required|string|max:255',
            'nombre_propietario' => 'required|string|max:255',
            'telefono_propietario' => 'required|max:10',
            'edad_mascota' => 'required|integer|min:0',
            'sexo_mascota' => 'required|string|in:Hembra,Macho',
            'fecha_cita' => ['required', 'date_format:Y-m-d', 'after:' . date('Y-m-d')],
            'hora_cita' => 'required',
            'razon_cita' => 'required|string|max:255',
        ], $messages);

        $cita = Citas::create([
            'nombre_mascota' => $request->nombre_mascota,
            'raza_mascota' => $request->raza_mascota,
            'nombre_propietario' => $request->nombre_propietario,
            'telefono_propietario' => $request->telefono_propietario,
            'edad_mascota' => $request->edad_mascota,
            'sexo_mascota' => $request->edad_mascota,
            'fecha_cita' => $request->fecha_cita,
            'hora_cita' => $request->hora_cita,
            'razon_cita' => $request->razon_cita,
        ]);

        return redirect()->route('citas');
    }

    public function obtener_citas()
    {
        $citas = Citas::all();

        $eventos = [];

        foreach ($citas as $cita) {
            $evento = [
                'title' => $cita->razon_cita,
                'start' => $cita->fecha_cita . 'T' . $cita->hora_cita,
                'end' => $cita->fecha_cita . 'T' . date('H:i:s', strtotime($cita->hora_cita . '+30 minutes')),
                'descripcio' => $cita->razon_cita,
                'nombre_mascota' => $cita->nombre_mascota,
                'raza_mascota' => $cita->raza_mascota,
                'nombre_propietario' => $cita->nombre_propietario,
                'telefono_propietario' => $cita->telefono_propietario,
                'edad_mascota' => $cita->edad_mascota,
                'sexo_mascota' => $cita->sexo_mascota,
                'razon_cita' => $cita->razon_cita,
            ];

            array_push($eventos, $evento);
        }

        return response()->json($eventos);
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
