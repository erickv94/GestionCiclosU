<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('codigoVerificacion',25)->nullable();
            $table->enum('sexo',['Masculino','Femenino']);
            $table->boolean('esVerificado')->default(0);
            $table->boolean('habilitado')->default(1);
            $table->timestamp('password_creado_en')->nullable();
            $table->timestamp('password_actualizado_en')->nullable();	
            $table->timestamp('lastLogin')->nullable();	
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
