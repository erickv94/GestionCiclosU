<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class PermisoRolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        ROL 1- admin 2-docente 3-coordinador 4-Asistente
        */
         Role::find(2)->syncPermissions([1,2,4,8,10,14,16]);
         Role::find(3)->syncPermissions([1,2,4,8,10,14,16,20,22]);
         Role::find(4)->syncPermissions([1,2,4,8,10,14,16,20,22]);

    }
}
