<?php

use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    /**
     * Corre los permisos asignados por rol
     */
    public function run()
    {
        //Asignacion permisos
        DB::table('role_user')->insert(['role_id' => '1','user_id'=>'1']);
        DB::table('role_user')->insert(['role_id' => '2','user_id'=>'2']);
        DB::table('role_user')->insert(['role_id' => '2','user_id'=>'3']);
        DB::table('role_user')->insert(['role_id' => '3','user_id'=>'4']);
    }
}
