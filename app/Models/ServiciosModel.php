<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiciosModel extends Model
{
    // use HasFactory;
    public $timestamps = false;
    protected $primaryKey="idservicio";
    protected $table="tbl_servicios";
    protected $fillable = [ 'tipo', 'descripcion', 'imagen'];
}
