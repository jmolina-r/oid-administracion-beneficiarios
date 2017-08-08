<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActividadesVidaDiariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades_vida_diarias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('alimentacion')->nullable();
            $table->string('comentario_alimen')->nullable();
            $table->string('arreglo_personal')->nullable();
            $table->string('comentario_arreglo')->nullable();
            $table->string('banio')->nullable();
            $table->string('comentario_banio')->nullable();
            $table->string('vestuario_superior')->nullable();
            $table->string('comentario_superior')->nullable();
            $table->string('vestuario_inferior')->nullable();
            $table->string('comentario_inferior')->nullable();
            $table->string('ponerse_zapatos')->nullable();
            $table->string('comentario_zapatos')->nullable();
            $table->string('aseo_perianal')->nullable();
            $table->string('comentario_aseo')->nullable();
            $table->string('lavado_dental')->nullable();
            $table->string('comentario_dental')->nullable();
            $table->string('manejo_vesical')->nullable();
            $table->string('comentario_vesical')->nullable();
            $table->string('manejo_anal')->nullable();
            $table->string('comentario_anal')->nullable();
            $table->string('preparar_comida')->nullable();
            $table->string('comentario_comida')->nullable();
            $table->string('poner_mesa')->nullable();
            $table->string('comentario_mesa')->nullable();
            $table->string('limpieza_ligera')->nullable();
            $table->string('comentario_ligera')->nullable();
            $table->string('espacio_ordenado')->nullable();
            $table->string('comentario_orden')->nullable();
            $table->string('manejo_dinero')->nullable();
            $table->string('comentario_dinero')->nullable();
            $table->string('ir_compras')->nullable();
            $table->string('comentario_compras')->nullable();
            $table->string('locomocion')->nullable();
            $table->string('comentario_locomocion')->nullable();
            $table->string('resolver_problemas')->nullable();
            $table->string('comentario_problemas')->nullable();
            $table->string('adecuacion_social')->nullable();
            $table->string('comentario_adecuacion')->nullable();
            $table->string('seguir_instrucciones')->nullable();
            $table->string('comentario_instrucciones')->nullable();
            $table->string('expresar_necesidades')->nullable();
            $table->string('comentario_necesidades')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades_vida_diarias');
    }
}
