<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrucel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey="idimagen";
    protected $table = 'tbl_carrucel';
    
    protected $fillable = [
        'idimagen',
        'nombre',
        'imagen'
    ];
}
