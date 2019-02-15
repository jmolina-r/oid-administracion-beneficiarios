<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialDemandasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_demandas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('demanda_beneficiario_id')->nullable();
            $table->unsignedInteger('estado_id')->nullable();
            $table->unsignedInteger('descripcion_id')->nullable();

        });

        Schema::table('historial_demandas', function($table) {
            $table->foreign('demanda_beneficiario_id')->references('id')->on('demanda_beneficiarios');
        });

        Schema::table('historial_demandas', function($table) {
            $table->foreign('estado_id')->references('id')->on('estados');
        });

        Schema::table('historial_demandas', function($table) {
            $table->foreign('descripcion_id')->references('id')->on('descripcions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_demandas');
    }
}
