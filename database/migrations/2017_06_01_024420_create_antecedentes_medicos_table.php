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
            $table->string('diagnostico')->nullable();
            $table->string('evaluacion_psiquiatra')->nullable();
            $table->string('enfermedades_familiares')->nullable();
            $table->string('tratamientos_psiquiatra')->nullable();
            $table->string('tratamientos_fonoaudiologo')->nullable();
            $table->string('tratamientos_ocupacional')->nullable();
            $table->string('tratamientos_kinesiologo')->nullable();
            $table->string('tratamientos_psicologo')->nullable();
            $table->string('tratamientos_neurologo')->nullable();
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
