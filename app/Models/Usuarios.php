<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Usuarios extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_usuarios';
    protected $primaryKey = "idusuario";
    protected $fillable = ['nombre', 'apaterno', 'amaterno', 'telefono', 'email', 'direccion', 'nombre_usuario', 'idpreguntasecreta', 'respuesta', 'password','remember_token'];

    // Relación con la tabla tbl_horarios
    public function preguntasecreta()
    {
        return $this->belongsTo(PreguntaSecreta::class, 'idpreguntasecreta', 'idpreguntasecreta');
    }
}
