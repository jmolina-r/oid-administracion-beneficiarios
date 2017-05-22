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
            $table->string('contacto_visual')->nullable();
            $table->string('sonrisa_social')->nullable();
            $table->string('seguimiento_personas')->nullable();
            $table->string('seguimiento_objetos')->nullable();
            $table->string('investigacion_visual')->nullable();
            $table->string('investigacion_motora')->nullable();
            $table->string('atencion_conjunta')->nullable();
            $table->string('imitacion_gestual')->nullable();
            $table->string('imitacion_vocal')->nullable();
            $table->string('imitacion_motora')->nullable();
            $table->string('situaciones_repetidas')->nullable();
            $table->string('situaciones_nuevas')->nullable();
            $table->string('intencion_comunicacional')->nullable();
            $table->string('carinioso')->nullable();
            $table->string('juego_solitario')->nullable();
            $table->string('juego_paralelo')->nullable();
            $table->string('juego_interactivo')->nullable();
            $table->string('gestos_adecuados')->nullable();
            $table->string('inicia_conversacion')->nullable();
            $table->string('formula_peticiones')->nullable();
            $table->string('aclarar_dudas')->nullable();
            $table->string('emisor_receptor')->nullable();
            $table->string('ninios_edad')->nullable();
            $table->string('preferencia_tipo_persona')->nullable();
            $table->string('mayores_intereses')->nullable();
            $table->string('cosas_no_gustan')->nullable();
            $table->string('juegos')->nullable();
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
