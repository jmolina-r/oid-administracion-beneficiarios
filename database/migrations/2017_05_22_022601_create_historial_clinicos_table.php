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
            $table->string('enfermedades_familiares',200)->nullable();
            $table->string('evaluacion_psiquiatra',200)->nullable();
            $table->string('evaluacion_fonoaudiologo',200)->nullable();
            $table->string('evaluacion_ocupacional',200)->nullable();
            $table->string('evaluacion_kinesiologo',200)->nullable();
            $table->string('evaluacion_psicologo',200)->nullable();
            $table->string('otra_evaluacion',200)->nullable();
            $table->string('tratamientos_recibidos',200)->nullable();
            $table->string('medicamentos_sn',200)->nullable();
            $table->string('medicamentos',200)->nullable();
            $table->string('efectos_medicamentos',200)->nullable();
            $table->string('diagnosticos_previos',200)->nullable();
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
