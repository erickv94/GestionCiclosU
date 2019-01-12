<?php

use Illuminate\Database\Seeder;
use App\User;

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
            'email'=>'admin@example.com',
            'password'=>bcrypt('admin'),
        ]);

        User::create([
            'name'=>'Zoila Yaneth',
            'email'=>'docente1@example.com',
            'password'=>bcrypt('docente'),
        ]);

        User::create([
            'name'=>'Samantha X',
            'email'=>'docente2@example.com',
            'password'=>bcrypt('docente'),
        ]);

        User::create([
            'name'=>'Eduardo X',
            'email'=>'asistente@example.com',
            'password'=>bcrypt('docente'),
        ]);

        
        factory(App\User::class, 10)->create();
    }
}
