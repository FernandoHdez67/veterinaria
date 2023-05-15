<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUsuarios extends Model
{
    //use HasFactory;
    public $timestamps = false;
    protected $table = 'tbl_roles';
    protected $fillable = ['nombre', 'email', 'password','role','remember_token'];  
}
