<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesarrolloEvolutivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_evolutivos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('edad_sento',200)->nullable();
            $table->string('edad_camino',200)->nullable();
            $table->string('edad_palabra',200)->nullable();
            $table->string('control_vesical_sn',200)->nullable();
            $table->string('edad_control_vesical',200)->nullable();
            $table->string('control_anal_sn',200)->nullable();
            $table->string('edad_control_anal',200)->nullable();
            $table->string('vesical_diurno',200)->nullable();
            $table->string('vesical_nocturno',200)->nullable();
            $table->string('anal_diurno',200)->nullable();
            $table->string('anal_nocturno',200)->nullable();
            $table->string('observaciones',200)->nullable();
            $table->string('estabilidad_caminar_sna',200)->nullable();
            $table->string('caidas_frecuentes_sna',200)->nullable();
            $table->string('dominancia_lateral_sna',200)->nullable();
            $table->string('garra_sna',200)->nullable();
            $table->string('pinza_sna',200)->nullable();
            $table->string('como_pinza',200)->nullable();
            $table->string('dibuja_sna',200)->nullable();
            $table->string('escribe_sna',200)->nullable();
            $table->string('corta_sna',200)->nullable();
            $table->string('estimulos_visuales',200)->nullable();
            $table->string('estimulos_auditivos',200)->nullable();
            $table->string('estimulos_gustativos',200)->nullable();
            $table->string('estimulos_tactiles',200)->nullable();
            $table->string('estimulos_olfativos',200)->nullable();
            $table->string('come_solo_sn',200)->nullable();
            $table->string('acepta_solido_sn',200)->nullable();
            $table->string('acepta_semisolido_sn',200)->nullable();
            $table->string('acepta_liquidos_sn',200)->nullable();
            $table->string('temperatura_preferida',200)->nullable();
            $table->string('sabores_preferidos',200)->nullable();
            $table->string('colores_preferidos',200)->nullable();
            $table->string('ejemplo_comida',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollo_evolutivos');
    }
}
