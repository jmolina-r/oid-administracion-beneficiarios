<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaPsicologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_psicologias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('motivo_consulta')->nullable();
            $table->binary('genograma')->nullable();

            $table->string('antecedentes_medicos_id')->nullable();
            $table->string('antecedentes_familiares_id')->nullable();
            $table->string('psicologo_id')->nullable();
            $table->string('beneficiario_id')->nullable();
        });

        Schema::table('ficha_psicologias', function($table) {
            $table->foreign('antecedentes_medicos_id')->references('id')->on('antecedentes_medicos');
        });

        Schema::table('ficha_psicologias', function($table) {
            $table->foreign('antecedentes_familiares_id')->references('id')->on('antecedentes_familiares');
        });

        Schema::table('ficha_psicologias', function($table) {
            $table->foreign('psicologo_id')->references('id')->on('psicologos');
        });

        Schema::table('ficha_psicologias', function($table) {
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
        Schema::dropIfExists('ficha_psicologias');
    }
}
