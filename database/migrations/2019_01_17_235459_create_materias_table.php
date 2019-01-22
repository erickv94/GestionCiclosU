<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',10)->unique();
            $table->string('nombre',50);
            $table->boolean('habilitado')->default(1);
            $table->string('descripcion')->nullable();
            $table->enum('ciclo',['Impar','Par','Ambos']);
            $table->enum('nivel',[1,2,3,4,5]);
            $table->unsignedInteger('docente_id')->nullable()->unique();
            $table->timestamps();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
