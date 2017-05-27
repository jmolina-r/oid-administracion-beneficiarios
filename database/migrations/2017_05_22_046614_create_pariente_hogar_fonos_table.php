<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParienteHogarFonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pariente_hogar_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->string('parentesco');
            $table->string('edad')->nullable();
            $table->string('escolaridad')->nullable();
            $table->string('ocupacion')->nullable();

            $table->integer('ficha_fonoaudiologia_id')->unsigned();
        });

        Schema::table('pariente_hogar_fonos', function($table) {
            $table->foreign('ficha_fonoaudiologia_id')->references('id')->on('ficha_fonoaudiologia');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pariente_hogar_fonos');
    }
}
