<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'idusuario';

    public function verificarCredenciales($email, $password)
    {
        $usuario = $this->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario->password)) {
            return $usuario;
        }

        return null;
    }
}
