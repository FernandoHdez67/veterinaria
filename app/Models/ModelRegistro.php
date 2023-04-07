<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRegistro extends Model
{
    use HasFactory;
    protected $fillable  = [ 
        'nombre', 
        'apaterno', 
        'amaterno', 
        'telefono', 
        'correo', 
        'direccion', 
        'nombre_usuario', 
        'contrasenia'];

    // public function setPasswordAttribute($value){
    //     $this->attributes['contrasenia'] = bcrypt($value);
    // }
}
