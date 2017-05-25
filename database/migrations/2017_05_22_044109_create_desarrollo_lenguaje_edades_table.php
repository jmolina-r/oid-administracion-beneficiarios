<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesarrolloLenguajeEdadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_lenguaje_edades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('balbuceo')->nullable();
            $table->string('sonrio')->nullable();
            $table->string('primeras_palabras')->nullable();
            $table->string('frases_dos_palabras')->nullable();
            $table->string('oraciones')->nullable();
            $table->string('hablo_espo')->nullable();
            $table->string('siguio_inst')->nullable();

            $table->integer('desarrollo_lenguaje_sino_id')->unsigned();;
        });

        Schema::table('desarrollo_lenguaje_edades', function($table) {
            $table->foreign('desarrollo_lenguaje_sino_id')->references('id')->on('desarrollo_lenguaje_sino');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollo_lenguaje_edades');
    }
}
