<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesFamiliaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_familiares', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre_madre',200)->nullable();
            $table->string('edad_madre',200)->nullable();
            $table->string('ocupacion_madre',200)->nullable();
            $table->string('escolaridad_madre',200)->nullable();
            $table->string('telefono_madre',200)->nullable();
            $table->string('observaciones_madre',200)->nullable();
            $table->string('fecha_nacimiento_madre',200)->nullable();
            $table->string('rut_madre',200)->nullable();
            $table->string('nombre_padre',200)->nullable();
            $table->string('edad_padre',200)->nullable();
            $table->string('ocupacion_padre',200)->nullable();
            $table->string('escolaridad_padre',200)->nullable();
            $table->string('telefono_padre',200)->nullable();
            $table->string('observaciones_padre',200)->nullable();
            $table->string('fecha_nacimiento_padre',200)->nullable();
            $table->string('rut_padre',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_familiares');
    }
}
