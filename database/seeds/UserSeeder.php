<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Docente;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        User::create([
            'name'=>'Erick Ventura',
            'esVerificado'=>true,
            'sexo'=>'Masculino',
            'codigoVerificacion'=>str_random(25),
            'email'=>'admin@example.com',
            'password'=>bcrypt('admin'),
        ]);

        User::create([
            'name'=>'Zoila Yaneth',
            'esVerificado'=>true,
            'sexo'=>'Femenino',
            'codigoVerificacion'=>str_random(25),
            'email'=>'docente1@example.com',
            'password'=>bcrypt('docente'),
        ]);
        Docente::create([
            'esCoordinador'=>true,
            'user_id'=>2
            ]);
        
        User::create([
            'name'=>'Samantha Docente',
            'codigoVerificacion'=>str_random(25),
            'sexo'=>'Femenino',
            'email'=>'docente2@example.com',
            'password'=>bcrypt('docente'),
        ]);

        Docente::create([
            'user_id'=>3,
            ]);

        User::create([
            'name'=>'Eduardo Asistente',
            'codigoVerificacion'=>str_random(25),
            'sexo'=>'Masculino',
            'email'=>'asistente@example.com',
            'password'=>bcrypt('asistente'),
        ]);

        //docentes mas
    factory(App\User::class, 20)->create()->each(function($user){
        
        $user->docente()->save(new Docente());
        $user->assignRole(2);
    });
    //3 asistentes mas 
    factory(App\User::class, 3)->create()->each(function($user){
        
        $user->assignRole(4);
    });
    

    }
}
