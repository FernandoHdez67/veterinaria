<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{
        // use HasFactory;
   public $timestamps = false;
   protected $primaryKey="idhorario";
   protected $table="tbl_horarios";
   protected $fillable = [ 'horario'];
   
}
