<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(PermisoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(PermisoRolSeeder::class);
        $this->call(UserSeeder::class);
        
        //roles asignados a usuarios por defectos
        $this->call(RoleUserSeeder::class);
        $this->call(LocalSeeder::class);
        $this->call(MateriaSeeder::class);
    }


}
