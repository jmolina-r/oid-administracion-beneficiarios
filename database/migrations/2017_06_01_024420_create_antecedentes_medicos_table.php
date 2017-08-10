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
            $table->string('evaluacion_psiquiatra',200)->nullable();
            $table->string('enfermedades_familiares',200)->nullable();
            $table->string('tratamientos_neurologo_nombre',200)->nullable();
            $table->string('tratamientos_neurologo_sesiones',200)->nullable();
            $table->string('tratamientos_psiquiatra_nombre',200)->nullable();
            $table->string('tratamientos_psiquiatra_sesiones',200)->nullable();
            $table->string('tratamientos_fonoaudiologo_nombre',200)->nullable();
            $table->string('tratamientos_fonoaudiologo_sesiones',200)->nullable();
            $table->string('tratamientos_ocupacional_nombre',200)->nullable();
            $table->string('tratamientos_ocupacional_sesiones',200)->nullable();
            $table->string('tratamientos_kinesiologo_nombre')->nullable();
            $table->string('tratamientos_kinesiologo_sesiones',200)->nullable();
            $table->string('tratamientos_psicologo_nombre',200)->nullable();
            $table->string('tratamientos_psicologo_sesiones',200)->nullable();
            $table->string('medicamentos',200)->nullable();
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
