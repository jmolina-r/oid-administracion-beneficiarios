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
            $table->string('balbuceo',200)->nullable();
            $table->string('sonrio',200)->nullable();
            $table->string('primeras_palabras',200)->nullable();
            $table->string('frases_dos_palabras',200)->nullable();
            $table->string('oraciones',200)->nullable();
            $table->string('hablo_espo',200)->nullable();
            $table->string('siguio_inst',200)->nullable();
            $table->string('mira_ojos',200)->nullable();
            $table->string('mira_labios',200)->nullable();
            $table->string('comunica_palabras',200)->nullable();
            $table->string('comunica_jergas',200)->nullable();
            $table->string('comunica_palabras_sueltas',200)->nullable();
            $table->string('comunica_gestos',200)->nullable();
            $table->string('entiende_dice',200)->nullable();
            $table->string('desconocidos_entienden',200)->nullable();

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
