<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaTerapiaOcupacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_terapia_ocupacionals', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('motivo_consulta',200)->nullable();
            $table->string('estado',200)->nullable();
            $table->string('derivado_por',200)->nullable();
            $table->string('relacion_paciente',200)->nullable();
            $table->string('observaciones_generales',200)->nullable();

            $table->integer('actividades_vida_diaria_id')->unsigned();
            $table->integer('antecedentes_salud_id')->unsigned();
            $table->integer('antecedentes_so_fa_id')->unsigned();
            $table->integer('desarrollo_evolutivo_id')->unsigned();
            $table->integer('habilidades_sociales_id')->unsigned();
            $table->integer('historial_clinico_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('actividades_vida_diaria_id')->references('id')->on('actividades_vida_diarias');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('antecedentes_salud_id')->references('id')->on('antecedentes_saluds');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('antecedentes_so_fa_id')->references('id')->on('antecedentes_socio_familiares');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('desarrollo_evolutivo_id')->references('id')->on('desarrollo_evolutivos');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('habilidades_sociales_id')->references('id')->on('habilidades_sociales');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('historial_clinico_id')->references('id')->on('historial_clinicos');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('ficha_terapia_ocupacionals', function($table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_terapia_ocupacionals');
    }
}
