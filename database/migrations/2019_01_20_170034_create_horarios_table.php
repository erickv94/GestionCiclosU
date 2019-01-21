<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->enum('nivel',[1,2,3,4,5]);
            $table->string('referido');
            $table->string('descripcion')->nullable();
            $table->unsignedInteger('planificacion_id');
            $table->foreign('planificacion_id')->references('id')->on('planificaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('horarios');
    }
}
