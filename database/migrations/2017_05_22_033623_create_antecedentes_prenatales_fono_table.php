<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesPrenatalesFonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_prenatales_fono', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('plan_embarazo')->nullable();
            $table->string('acept_embarazo')->nullable();
            $table->string('control_embarazo')->nullable();
            $table->string('ingesta_med')->nullable();
            $table->string('ingesta_oh_drogas')->nullable();
            $table->string('consumo_cigarrillo')->nullable();
            $table->string('estado_emocional')->nullable();
            $table->string('enfermedades_embarazo')->nullable();
            $table->string('otros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_prenatales_fono');
    }
}
