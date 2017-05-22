<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaAtencionSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_atencion_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero');
            $table->string('descripcion');

            $table->integer('prestacion_realizadas_id')->unsigned();
        });
        Schema::table('ficha_atencion_socials', function ($table){
            $table->foreign('prestacion_realizadas_id')->references('id')->on('prestacion_realizadas')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_atencion_socials');
    }
}
