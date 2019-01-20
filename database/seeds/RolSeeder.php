<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Administrador(a) del sistema',
            'slug'=>'administrador',
            'description'=>'Ejerce la administracion general del sistema',
            'special'=>'all-access'        
        ]);
        Role::create([
            'name'=>'Docente de la Facultad',
            'slug'=>'docente',
            'description'=>'Ejerce tareas especificas de asistencia en el sistema',
        ]);
        Role::create([
            'name'=>'Coordinador(a) de materia',
            'slug'=>'coordinador',
            'description'=>'Ejerce la coordinacion de materia especifica en el sistema',
        ]);
        Role::create([
            'name'=>'Asistente del sistema',
            'slug'=>'asistente',
            'description'=>'Ejerce tareas especificas de asistencia en el sistema',
        ]);

    }
}
