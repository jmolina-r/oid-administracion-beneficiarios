<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesSocioFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_socio_familiares', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_madre',200)->nullable();
            $table->string('edad_madre',200)->nullable();
            $table->string('ocupacion_madre',200)->nullable();
            $table->string('escolaridad_madre',200)->nullable();
            $table->string('horario_trabajo_madre',200)->nullable();
            $table->string('nombre_padre',200)->nullable();
            $table->string('edad_padre',200)->nullable();
            $table->string('ocupacion_padre',200)->nullable();
            $table->string('escolaridad_padre',200)->nullable();
            $table->string('horario_trabajo_padre',200)->nullable();
            $table->binary('genograma')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_socio_familiares');
    }
}
