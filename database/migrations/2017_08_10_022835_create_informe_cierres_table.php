<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeCierresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_cierres', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('cant_sesiones');
            $table->date('fecha_inicio');
            $table->date('fecha_termino');
            $table->string('motivo_atencion');
            $table->string('objetivos_trabajados');
            $table->smallInteger('desercion');
            $table->smallInteger('culmino_proceso');
            $table->string('observacion')->nullable();

            $table->integer('beneficiario_id')->unsigned()->nullable();
            $table->integer('prestacion_realizada_id')->unsigned()->nullable();

        });
        Schema::table('informe_cierres', function ($table){
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
            $table->foreign('prestacion_realizada_id')->references('id')->on('prestacion_realizadas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informe_cierres');
    }
}
