<?php

namespace App\Http\Controllers;

use App\Models\sf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Citas;
use App\Models\Horario;
use DateTime;
use DateInterval;
use Illuminate\Validation\Rule;
use App\Models\Servicio;




class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function horario(Request $request)
    {
        $servicios = Servicio::all(); // Obtén todos los registros de la tabla tbl_servicios
        $horario = Horario::all();
        return view('modulos.citas', ['servicios' => $servicios, 'horario' => $horario]);
    }


    public function citas(Request $request)
    {
        $texto = trim($request->get('texto'));
        $citas = DB::table('tbl_citas')
            ->select('id', 'nombre_mascota', 'raza_mascota', 'nombre_propietario', 'telefono_propietario', 'edad_mascota', 'sexo_mascota', 'fecha_cita', 'tbl_horarios.horario as hora_cita', 'razon_cita')
            ->leftJoin('tbl_horarios', 'tbl_citas.hora_cita', '=', 'tbl_horarios.idhorario')
            ->where('nombre_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('raza_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('nombre_propietario', 'LIKE', '%' . $texto . '%')
            ->orWhere('telefono_propietario', 'LIKE', '%' . $texto . '%')
            ->orWhere('edad_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('sexo_mascota', 'LIKE', '%' . $texto . '%')
            ->orWhere('fecha_cita', 'LIKE', '%' . $texto . '%')
            ->orWhere('tbl_horarios.horario', 'LIKE', '%' . $texto . '%') // Aquí también debes cambiar a 'tbl_horarios.horario'
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
            'fecha_cita.required' => 'La fecha de la cita es obligatoria',
            'fecha_cita.date' => 'La fecha de la cita debe ser una fecha válida',
            'hora_cita.required' => 'La hora de la cita es obligatoria',
            'razon_cita.required' => 'La razón de la cita es obligatoria',
            // Agregar el mensaje personalizado para la regla de unicidad en 'hora_cita'
            'hora_cita.unique' => 'El horario seleccionado ya está ocupado. Por favor, elige otro horario.',
        ];

        $request->validate([
            'nombre_mascota' => 'required|string|max:255',
            'raza_mascota' => 'required|string|max:255',
            'nombre_propietario' => 'required|string|max:255',
            'telefono_propietario' => 'required|numeric|digits:10',
            'edad_mascota' => 'required|integer|min:0',
            'sexo_mascota' => 'required',
            'fecha_cita' => [
                'required', 'date_format:Y-m-d',
                function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(date('Y-m-d'))) {
                        $fail('No puede agendar citas con fechas anteriores.');
                    }
                },
            ],
            'hora_cita' => [
                'required',
                // Verificar unicidad del horario para la fecha seleccionada
                Rule::unique('tbl_citas')->where(function ($query) use ($request) {
                    return $query->where('fecha_cita', $request->fecha_cita)
                        ->where('hora_cita', $request->hora_cita);
                }),
            ],
            'razon_cita' => 'required|string|max:255',
        ], $messages);

        $cita = Citas::create([
            'nombre_mascota' => $request->nombre_mascota,
            'raza_mascota' => $request->raza_mascota,
            'nombre_propietario' => $request->nombre_propietario,
            'telefono_propietario' => $request->telefono_propietario,
            'edad_mascota' => $request->edad_mascota,
            'sexo_mascota' => $request->sexo_mascota,
            'fecha_cita' => $request->fecha_cita,
            'hora_cita' => $request->hora_cita,
            'razon_cita' => $request->razon_cita,
        ]);

        return redirect()->route('citas')->with('success', 'Su cita ha sido registrada.');
    }

    public function obtener_citas()
    {
        $citas = Citas::all();

        $eventos = [];

        foreach ($citas as $cita) {

            $evento = [
                'title' => $cita->razon_cita,
                'start' => $cita->hora_cita,
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
    public function destroy($id)
    {


        $citas = Citas::find($id);

        if (!$citas) {
            abort(404);
        }

        // Eliminar la cita
        $citas->delete();

        return redirect()->route('citass');
    }
}
