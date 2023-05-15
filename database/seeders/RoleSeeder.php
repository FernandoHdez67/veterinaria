<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'veterinario']);

        Permission::create(['name'=>'dashboard']);

        Permission::create(['name'=>'citass.index']);
        Permission::create(['name'=>'citass.create']);
        Permission::create(['name'=>'citass.edit']);
        Permission::create(['name'=>'citass.destroy']);

        Permission::create(['name'=>'products.index']);
        Permission::create(['name'=>'products.create']);
        Permission::create(['name'=>'products.edit']);
        Permission::create(['name'=>'products.destroy']);

        Permission::create(['name'=>'categorias.index']);
        Permission::create(['name'=>'categorias.create']);
        Permission::create(['name'=>'categorias.edit']);
        Permission::create(['name'=>'categorias.destroy']);

        Permission::create(['name'=>'marcas.index']);
        Permission::create(['name'=>'marcas.create']);
        Permission::create(['name'=>'marcas.edit']);
        Permission::create(['name'=>'marcas.destroy']);

        Permission::create(['name'=>'services.index']);
        Permission::create(['name'=>'services.create']);
        Permission::create(['name'=>'services.edit']);
        Permission::create(['name'=>'services.destroy']);

        Permission::create(['name'=>'users']);

        Permission::create(['name'=>'carruseladmin.index']);
        Permission::create(['name'=>'carruseladmin.create']);
        Permission::create(['name'=>'carruseladmin.edit']);
        Permission::create(['name'=>'carruseladmin.destroy']);

        Permission::create(['name'=>'ayudaa.index']);
        Permission::create(['name'=>'ayudaa.create']);
        Permission::create(['name'=>'ayudaa.edit']);
        Permission::create(['name'=>'ayudaa.destroy']);

        Permission::create(['name'=>'configuracion.index']);
        Permission::create(['name'=>'configuracion.create']);
        Permission::create(['name'=>'configuracion.edit']);
        Permission::create(['name'=>'configuracion.destroy']);
        
        // $user = User::find(1);
        // $user->assignRole($role1); 
    }
}
