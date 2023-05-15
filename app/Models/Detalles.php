<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalles extends Model
{
    // use HasFactory;
    protected $table="tbl_productos";
    protected $fillable = [
        'nombre',
        'precio', 
        'cantidad', 
        'categoria',
        'marca',
        'descripcion', 
        'imagen'
    ];
}
