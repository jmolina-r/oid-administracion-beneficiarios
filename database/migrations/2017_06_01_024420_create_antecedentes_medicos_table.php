<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('evaluacion_psiquiatra')->nullable();
            $table->string('enfermedades_familiares')->nullable();
            $table->string('tratamientos_neurologo_nombre')->nullable();
            $table->string('tratamientos_neurologo_sesiones')->nullable();
            $table->string('tratamientos_psiquiatra_nombre')->nullable();
            $table->string('tratamientos_psiquiatra_sesiones')->nullable();
            $table->string('tratamientos_fonoaudiologo_nombre')->nullable();
            $table->string('tratamientos_fonoaudiologo_sesiones')->nullable();
            $table->string('tratamientos_ocupacional_nombre')->nullable();
            $table->string('tratamientos_ocupacional_sesiones')->nullable();
            $table->string('tratamientos_kinesiologo_nombre')->nullable();
            $table->string('tratamientos_kinesiologo_sesiones')->nullable();
            $table->string('tratamientos_psicologo_nombre')->nullable();
            $table->string('tratamientos_psicologo_sesiones')->nullable();
            $table->string('medicamentos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_medicos');
    }
}
