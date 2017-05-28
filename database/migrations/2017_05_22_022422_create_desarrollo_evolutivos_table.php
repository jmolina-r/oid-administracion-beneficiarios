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
            $table->string('edad_sento')->nullable();
            $table->string('edad_camino')->nullable();
            $table->string('edad_palabra')->nullable();
            $table->string('control_vesical_sn')->nullable();
            $table->string('edad_control_vesical')->nullable();
            $table->string('control_anal_sn')->nullable();
            $table->string('edad_control_anal')->nullable();
            $table->string('vesical_diurno')->nullable();
            $table->string('vesical_nocturno')->nullable();
            $table->string('anal_diurno')->nullable();
            $table->string('anal_nocturno')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('estabilidad_caminar_sna')->nullable();
            $table->string('caidas_frecuentes_sna')->nullable();
            $table->string('dominancia_lateral_sna')->nullable();
            $table->string('garra_sna')->nullable();
            $table->string('pinza_sna')->nullable();
            $table->string('como_pinza')->nullable();
            $table->string('dibuja_sna')->nullable();
            $table->string('escribe_sna')->nullable();
            $table->string('corta_sna')->nullable();
            $table->string('estimulos_visuales')->nullable();
            $table->string('estimulos_auditivos')->nullable();
            $table->string('estimulos_gustativos')->nullable();
            $table->string('estimulos_tactiles')->nullable();
            $table->string('estimulos_olfativos')->nullable();
            $table->string('come_solo_sn')->nullable();
            $table->string('acepta_solido_sn')->nullable();
            $table->string('acepta_semisolido_sn')->nullable();
            $table->string('acepta_liquidos_sn')->nullable();
            $table->string('temperatura_preferida')->nullable();
            $table->string('sabores_preferidos')->nullable();
            $table->string('colores_preferidos')->nullable();
            $table->string('ejemplo_comida')->nullable();
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
