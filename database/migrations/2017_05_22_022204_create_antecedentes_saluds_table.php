<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesSaludsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_saluds', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tiempo_gestacional',200)->nullable();
            $table->string('tipo_parto',200)->nullable();
            $table->string('enfermedades_natal_sn',200)->nullable();
            $table->string('observaciones_enfermedades',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_saluds');
    }
}
