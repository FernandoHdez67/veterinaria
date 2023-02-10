<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'apaterno' => 'required',
            'amaterno' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|unique:tbl_usuarios,correo',
            'nombre_usuario' => 'required|unique:tbl_usuarios,nombre_usuario',
            'contrasenia' => 'required|min:8',
            'confcontrasenia' => 'required|same:contrasenia',
        ];
    }
}
