<?php

use Illuminate\Database\Seeder;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siglas=['ED','LAB','SIS'];
        $tipo=['Edificio','Laboratorio','Auditorio','Centro de computo'];

        $siglasCantidad=count($siglas)-1;
        $tipoCantidad=count($siglas)-1; 
        for ($i=1; $i <=45 ; $i++) { 
            factory(App\Local::class)->create([
                'codigo'=>$siglas[rand(0,$siglasCantidad)].'-'.$i,
                'tipo'=>$tipo[rand(0,$tipoCantidad)],
                'nombre'=>'Local prueba '.$i
                ]);
            # code...
        }


    }
}
