<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey="idconfiguracion";
    protected $table="tbl_configuracion";
    protected $fillable = [ 'vision', 'mision','valores', 'imgsomos'];
}
