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
            $table->string('motivo_consulta',200)->nullable();
            $table->string('estado',200)->nullable();
            $table->string('genograma',300)->nullable();
            $table->string('diagnostico_base',200)->nullable();
            $table->integer('antecedentes_medicos_id')->unsigned();
            $table->integer('antecedentes_familiares_id')->unsigned();
            $table->integer('funcionario_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('ficha_psicologias', function($table) {
            $table->foreign('antecedentes_medicos_id')->references('id')->on('antecedentes_medicos');
        });

        Schema::table('ficha_psicologias', function($table) {
            $table->foreign('antecedentes_familiares_id')->references('id')->on('antecedentes_familiares');
        });

        Schema::table('ficha_psicologias', function($table) {
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
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
