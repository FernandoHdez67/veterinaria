<?php

namespace App\Models;

class Admin extends User
{
    protected $table = 'tbl_roles';

    public function __construct()
    {
        parent::__construct();

        $this->setAttribute('role', 'admin');
    }
}
