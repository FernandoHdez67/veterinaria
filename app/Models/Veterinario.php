<?php

// app/Models/Veterinario.php

namespace App\Models;

class Veterinario extends User
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();

        $this->setAttribute('role', 'veterinario');
    }
}
