<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ayuda extends Model
{
   // use HasFactory;
   public $timestamps = false;
   protected $primaryKey="idpregunta";
   protected $table="tbl_ayuda";
   protected $fillable = [ 'pregunta', 'respuesta'];
}
