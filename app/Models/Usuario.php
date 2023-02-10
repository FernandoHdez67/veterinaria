<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'tbl_usuarios';

    protected $fillable = [
        'nombre', 
        'apaterno', 
        'amaterno',
        'telefono',
        'correo',
        'direccion',
        'nombre_usuario', 
        'contrasenia',
    ];
}
