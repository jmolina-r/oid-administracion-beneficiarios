<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialClinicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_clinicos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('enfermedades_familiares')->nullable();
            $table->string('evaluacion_psiquiatra')->nullable();
            $table->string('evaluacion_fonoaudiologo')->nullable();
            $table->string('evaluacion_ocupacional')->nullable();
            $table->string('evaluacion_kinesiologo')->nullable();
            $table->string('evaluacion_psicologo')->nullable();
            $table->string('otra_evaluacion')->nullable();
            $table->string('tratamientos_recibidos')->nullable();
            $table->string('medicamentos_sn')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('efectos_medicamentos')->nullable();
            $table->string('diagnosticos_previos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_clinicos');
    }
}
