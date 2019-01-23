<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCuposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('dia',['Lunes','Martes','Miercoles','Jueves','Viernes']);
            $table->time('horaInicio');
            $table->time('horaFin');
            $table->unsignedInteger('grupo_id');
            $table->unsignedInteger('local_id');
            $table->unsignedInteger('horario_id');

            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
            $table->foreign('local_id')->references('id')->on('locales')->onDelete('cascade');
            $table->foreign('horario_id')->references('id')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cupos');
    }
}
