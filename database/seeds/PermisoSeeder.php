<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name'=>'Dashboard del sistema',
            'slug'=>'index',
            'description'=>'Pagina de inicio del sistema',
        ]);

        //modulo docentes
        Permission::create([
            'name'=>'index docente',
            'slug'=>'docentes.index',
            'description'=>'Listar docentes en el sistema',
        ]);
        Permission::create([
            'name'=>'crear docente',
            'slug'=>'docentes.create',
            'description'=>'Crear docentes en el sistema',
        ]);
        Permission::create([
            'name'=>'show docente',
            'slug'=>'docentes.show',
            'description'=>'Mostrar datos de docentes en el sistema',
        ]);
        Permission::create([
            'name'=>'update docente',
            'slug'=>'docentes.edit',
            'description'=>'Actualizar docente del sistema',
        ]);
        Permission::create([
            'name'=>'delete docente',
            'slug'=>'docentes.delete',
            'description'=>'Borrar docente del sistema',
        ]);
        
       //modulo materias
        Permission::create([
            'name'=>'index materias',
            'slug'=>'materias.index',
            'description'=>'Listar materias en el sistema',
        ]);
        Permission::create([
            'name'=>'crear materia',
            'slug'=>'materias.create',
            'description'=>'Crear materias en el sistema',
        ]);
        Permission::create([
            'name'=>'show materia',
            'slug'=>'materias.show',
            'description'=>'Mostrar datos de materias en el sistema',
        ]);
        Permission::create([
            'name'=>'update materia',
            'slug'=>'materias.edit',
            'description'=>'Actualizar materias del sistema',
        ]);
        Permission::create([
            'name'=>'delete materia',
            'slug'=>'materias.delete',
            'description'=>'Borrar materia del sistema',
        ]);    
    }
}
