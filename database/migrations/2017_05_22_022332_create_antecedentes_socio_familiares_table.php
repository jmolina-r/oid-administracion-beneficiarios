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
            $table->string('nombre_madre')->nullable();
            $table->string('edad_madre')->nullable();
            $table->string('ocupacion_madre')->nullable();
            $table->string('escolaridad_madre')->nullable();
            $table->string('horario_trabajo_madre')->nullable();
            $table->string('nombre_padre')->nullable();
            $table->string('edad_padre')->nullable();
            $table->string('ocupacion_padre')->nullable();
            $table->string('escolaridad_padre')->nullable();
            $table->string('horario_trabajo_padre')->nullable();
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
