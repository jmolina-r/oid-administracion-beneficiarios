<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabilidadesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habilidades_sociales', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('contacto_visual',200)->nullable();
            $table->string('sonrisa_social',200)->nullable();
            $table->string('seguimiento_personas',200)->nullable();
            $table->string('seguimiento_objetos',200)->nullable();
            $table->string('investigacion_visual',200)->nullable();
            $table->string('investigacion_motora',200)->nullable();
            $table->string('atencion_conjunta',200)->nullable();
            $table->string('imitacion_gestual',200)->nullable();
            $table->string('imitacion_vocal',200)->nullable();
            $table->string('imitacion_motora',200)->nullable();
            $table->string('situaciones_repetidas',200)->nullable();
            $table->string('situaciones_nuevas',200)->nullable();
            $table->string('intencion_comunicacional')->nullable();
            $table->string('carinioso',200)->nullable();
            $table->string('juego_solitario',200)->nullable();
            $table->string('juego_paralelo',200)->nullable();
            $table->string('juego_interactivo',200)->nullable();
            $table->string('gestos_adecuados',200)->nullable();
            $table->string('inicia_conversacion',200)->nullable();
            $table->string('formula_peticiones',200)->nullable();
            $table->string('aclarar_dudas',200)->nullable();
            $table->string('emisor_receptor',200)->nullable();
            $table->string('ninios_edad',200)->nullable();
            $table->string('preferencia_tipo_persona',200)->nullable();
            $table->string('mayores_intereses',200)->nullable();
            $table->string('cosas_no_gustan',200)->nullable();
            $table->string('juegos',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habilidades_sociales');
    }
}
