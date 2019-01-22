<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Permission;

class PermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Definicion de permisos a modulos del sistema
     * 
     * @return void
     */

    public function run()
    {
        //individuales
        Permission::create([
            'name'=>'Pagina principal del sistema',
            'slug'=>'index',
            'description'=>'Pagina de inicio del sistema',
                        ]);

        //modulo docentes
        Permission::create([
            'name'=>'Listar docentes',
            'slug'=>'docentes.index',
            'description'=>'Listar y navegar en docentes del sistema',
        ]);
        Permission::create([
            'name'=>'Crear docentes',
            'slug'=>'docentes.create',
            'description'=>'Crear docentes en el sistema',
        ]);
        Permission::create([
            'name'=>'Mostrar detalles de docentes',
            'slug'=>'docentes.show',
            'description'=>'Mostrar datos de docentes en el sistema',
        ]);
        Permission::create([
            'name'=>'Actualizar docentes',
            'slug'=>'docentes.edit',
            'description'=>'Actualizar docente del sistema',
        ]);
        Permission::create([
            'name'=>'inhabilitar docentes',
            'slug'=>'docentes.inhabilitar',
            'description'=>'Inhabilitar docentes en el sistema',
        ]);
        Permission::create([
            'name'=>'eliminar docentes',
            'slug'=>'docentes.delete',
            'description'=>'Eliminar docentes en el sistema',
        ]);
              //modulo materias
            Permission::create([
            'name'=>'Listar materias',
            'slug'=>'materias.index',
            'description'=>'Listar y navegar en materias del sistema',
        ]);
        Permission::create([
            'name'=>'Crear materias',
            'slug'=>'materias.create',
            'description'=>'Crear materias en el sistema',
        ]);
        Permission::create([
            'name'=>'Mostrar detalles de  materias',
            'slug'=>'materias.show',
            'description'=>'Mostrar datos de materias en el sistema',
        ]);
        Permission::create([
            'name'=>'Actualizar materias',
            'slug'=>'materias.edit',
            'description'=>'Actualizar materias en el sistema',
        ]);

        Permission::create([
            'name'=>'Inhabilitar materia',
            'slug'=>'materias.inhabilitar',
            'description'=>'Inhabilitar materias en el sistema',
        ]);   
            
        Permission::create([
            'name'=>'Eliminar materia',
            'slug'=>'materias.delete',
            'description'=>'Eliminar materias en el sistema',
        ]);   

                //modulo locales
        Permission::create([
            'name'=>'Listar locales',
            'slug'=>'locales.index',
            'description'=>'Listar y navegar en locales del sistema',
        ]);

        Permission::create([
            'name'=>'Crear locales',
            'slug'=>'locales.create',
            'description'=>'Crear locales en el sistema',
        ]);
        Permission::create([
            'name'=>'Mostrar detalles de locales',
            'slug'=>'locales.show',
            'description'=>'Mostrar datos de locales en el sistema',
        ]);
        Permission::create([
            'name'=>'Actualizar locales',
            'slug'=>'locales.edit',
            'description'=>'Actualizar locales del sistema',
        ]);
        Permission::create([
            'name'=>'Inhabilitar Locales',
            'slug'=>'locales.inhabilitar',
            'description'=>'Inhabilitar locales del sistema',
        ]);   
        Permission::create([
            'name'=>'Eliminar Locales',
            'slug'=>'locales.delete',
            'description'=>'Eliminar locales del sistema',
        ]);   
        //permisos modulo asistente
    
        Permission::create([
            'name'=>'Listar asistentes',
            'slug'=>'asistentes.index',
            'description'=>'Listar y navegar en asistentes del sistema',
        ]);

        Permission::create([
            'name'=>'Crear asistentes',
            'slug'=>'asistentes.create',
            'description'=>'Crear asistentes en el sistema',
        ]);
        Permission::create([
            'name'=>'Mostrar detalles de asistentes',
            'slug'=>'asistentes.show',
            'description'=>'Mostrar datos de asistentes en el sistema',
        ]);
        Permission::create([
            'name'=>'Actualizar asistentes',
            'slug'=>'asistentes.edit',
            'description'=>'Actualizar asistentes del sistema',
        ]);
        Permission::create([
            'name'=>'Inhabilitar asistentes',
            'slug'=>'asistentes.inhabilitar',
            'description'=>'Inhabilitar asistentes del sistema',
        ]);   
        Permission::create([
            'name'=>'Eliminar asistentes',
            'slug'=>'asistentes.delete',
            'description'=>'Eliminar asistentes del sistema',
        ]);   


        //planificacion de ciclo
        Permission::create([
            'name'=>'Planificacion index',
            'slug'=>'planificacion.index',
            'description'=>'planificacion.index',
        ]);   
    }
}
