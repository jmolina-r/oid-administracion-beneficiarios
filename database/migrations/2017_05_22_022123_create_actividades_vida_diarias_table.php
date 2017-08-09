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
            $table->string('alimentacion',1)->nullable();
            $table->string('comentario_alimen',200)->nullable();
            $table->string('arreglo_personal',1)->nullable();
            $table->string('comentario_arreglo',200)->nullable();
            $table->string('banio',1)->nullable();
            $table->string('comentario_banio',200)->nullable();
            $table->string('vestuario_superior',1)->nullable();
            $table->string('comentario_superior',200)->nullable();
            $table->string('vestuario_inferior',1)->nullable();
            $table->string('comentario_inferior',200)->nullable();
            $table->string('ponerse_zapatos',1)->nullable();
            $table->string('comentario_zapatos',200)->nullable();
            $table->string('aseo_perianal',1)->nullable();
            $table->string('comentario_aseo',200)->nullable();
            $table->string('lavado_dental',1)->nullable();
            $table->string('comentario_dental',200)->nullable();
            $table->string('manejo_vesical',1)->nullable();
            $table->string('comentario_vesical',200)->nullable();
            $table->string('manejo_anal',1)->nullable();
            $table->string('comentario_anal',200)->nullable();
            $table->string('preparar_comida',1)->nullable();
            $table->string('comentario_comida',200)->nullable();
            $table->string('poner_mesa',1)->nullable();
            $table->string('comentario_mesa',200)->nullable();
            $table->string('limpieza_ligera',1)->nullable();
            $table->string('comentario_ligera',200)->nullable();
            $table->string('espacio_ordenado',1)->nullable();
            $table->string('comentario_orden',200)->nullable();
            $table->string('manejo_dinero',1)->nullable();
            $table->string('comentario_dinero',200)->nullable();
            $table->string('ir_compras',1)->nullable();
            $table->string('comentario_compras',200)->nullable();
            $table->string('locomocion',1)->nullable();
            $table->string('comentario_locomocion',200)->nullable();
            $table->string('resolver_problemas',1)->nullable();
            $table->string('comentario_problemas',200)->nullable();
            $table->string('adecuacion_social',1)->nullable();
            $table->string('comentario_adecuacion',200)->nullable();
            $table->string('seguir_instrucciones',1)->nullable();
            $table->string('comentario_instrucciones',200)->nullable();
            $table->string('expresar_necesidades',1)->nullable();
            $table->string('comentario_necesidades',200)->nullable();
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
