<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userr extends Model
{

    protected $table = 'tbl_usuarios';
    protected $fillable = [
        'nombre', 
        'apaterno', 
        'amaterno', 
        'telefono', 
        'email', 
        'direccion', 
        'nombre_usuario', 
        'password'];
}
