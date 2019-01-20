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
         Role::find(2)->syncPermissions([1,2,]);
         Role::find(4)->syncPermissions([1]);

    }
}
