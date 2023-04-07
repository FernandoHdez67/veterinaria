<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreguntaSecreta extends Model
{
     // use HasFactory;
   public $timestamps = false;
   protected $primaryKey="idpreguntasecreta";
   protected $table="tbl_pregunta_secreta";
   protected $fillable = [ 'preguntasecreta'];
}
