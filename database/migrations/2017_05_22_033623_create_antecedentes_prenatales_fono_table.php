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
        Schema::create('antecedentes_prenatales_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('plan_embarazo',200)->nullable();
            $table->string('acept_embarazo',200)->nullable();
            $table->string('control_embarazo',200)->nullable();
            $table->string('ingesta_med',200)->nullable();
            $table->string('ingesta_oh_drogas',200)->nullable();
            $table->string('consumo_cigarrillo',200)->nullable();
            $table->string('estado_emocional',200)->nullable();
            $table->string('enfermedades_embarazo',200)->nullable();
            $table->string('otros',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_prenatales_fonos');
    }
}
