<?php

use Illuminate\Database\Seeder;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

        public function run()
    {
       $primeraPalabra=['Introducción a', 'Fundamentos de','Ingenieria de ','Analisis de', 'Diseño de '];
     
       $segundaPalabra=['la ingenieria de software','experimentos quimicos',
       'matematicas aplicadas','sistemas embebidos','bases de datos',
       'Ingenieria aplicada','fisica aplicada','termodinamica',
       'recoleccion de datos','ciencias politicas'];
        $cantidadPrimerapalabra=count($primeraPalabra)-1;
        $cantidadSegundaPalabra=count($segundaPalabra)-1;

        for ($i=1; $i <=10 ; $i++)
        { 
            factory(App\Materia::class)->create([
                'codigo'=>'MAT-'.$i.'-1',
                'nombre'=>($primeraPalabra[rand(0,$cantidadPrimerapalabra)]
                .' '.$segundaPalabra[rand(0,$cantidadSegundaPalabra)]),
                'nivel'=>1
                ]);
        }

        for ($i=1; $i <=10 ; $i++) 
        { 
            factory(App\Materia::class)->create([
                'codigo'=>'MAT-'.$i.'-2',
                'nombre'=>($primeraPalabra[rand(0,$cantidadPrimerapalabra)]
                .' '.$segundaPalabra[rand(0,$cantidadSegundaPalabra)]),
                'nivel'=>2
                ]);
        }

        for ($i=1; $i <=10 ; $i++) 
        { 
            factory(App\Materia::class)->create([
                'codigo'=>'MAT-'.$i.'-3',
                'nombre'=>($primeraPalabra[rand(0,$cantidadPrimerapalabra)]
                .' '.$segundaPalabra[rand(0,$cantidadSegundaPalabra)]),
                'nivel'=>3
                ]);
        }

        for ($i=1; $i <=10 ; $i++) 
        { 
            factory(App\Materia::class)->create([
                'codigo'=>'MAT-'.$i.'-4',
                'nombre'=>($primeraPalabra[rand(0,$cantidadPrimerapalabra)]
                .' '.$segundaPalabra[rand(0,$cantidadSegundaPalabra)]),
                'nivel'=>4
                ]);
        }        

        for ($i=1; $i <=10 ; $i++) 
        { 
            factory(App\Materia::class)->create([
                'codigo'=>'MAT-'.$i.'-5',
                'nombre'=>($primeraPalabra[rand(0,$cantidadPrimerapalabra)]
                .' '.$segundaPalabra[rand(0,$cantidadSegundaPalabra)]),
                'nivel'=>5
                ]);
        }
    } 

}
