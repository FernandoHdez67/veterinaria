<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'idusuario';
    protected $fillable = [
        'nombre', 
        'apaterno', 
        'amaterno', 
        'telefono', 
        'email', 
        'direccion', 
        'nombre_usuario', 
        'password'];

    public function verificarCredenciales($email, $password)
    {
        $usuario = $this->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario->password)) {
            return $usuario;
        }

        return null;
    }
}
