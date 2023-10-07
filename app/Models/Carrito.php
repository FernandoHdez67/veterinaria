<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public $timestamps = false;
    protected $table="tbl_carrito";
    protected $fillable = ['producto_id', 'nombre', 'cantidad', 'total'];
    
    
}
