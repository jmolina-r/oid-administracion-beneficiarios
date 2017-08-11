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
            $table->string('observaciones',200)->nullable();
            $table->string('nombre1',200)->nullable();
            $table->string('parentesco1',200)->nullable();
            $table->string('edad1',200)->nullable();
            $table->string('escolaridad1',200)->nullable();
            $table->string('ocupacion1',200)->nullable();
            $table->string('nombre2',200)->nullable();
            $table->string('parentesco2',200)->nullable();
            $table->string('edad2',200)->nullable();
            $table->string('escolaridad2',200)->nullable();
            $table->string('ocupacion2',200)->nullable();
            $table->string('nombre3',200)->nullable();
            $table->string('parentesco3',200)->nullable();
            $table->string('edad3',200)->nullable();
            $table->string('escolaridad3',200)->nullable();
            $table->string('ocupacion3',200)->nullable();
            $table->string('nombre4',200)->nullable();
            $table->string('parentesco4',200)->nullable();
            $table->string('edad4',200)->nullable();
            $table->string('escolaridad4',200)->nullable();
            $table->string('ocupacion4',200)->nullable();
            $table->string('nombre5',200)->nullable();
            $table->string('parentesco5',200)->nullable();
            $table->string('edad5',200)->nullable();
            $table->string('escolaridad5',200)->nullable();
            $table->string('ocupacion5',200)->nullable();
            $table->string('nombre6',200)->nullable();
            $table->string('parentesco6',200)->nullable();
            $table->string('edad6',200)->nullable();
            $table->string('escolaridad6',200)->nullable();
            $table->string('ocupacion6',200)->nullable();
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
