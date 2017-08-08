<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesMorbidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_morbidos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pat_concom', 200)->nullable();
            $table->string('alergias', 200)->nullable();
            $table->string('medicamentos', 200)->nullable();
            $table->string('ant_quir', 200)->nullable();
            $table->string('aparatos', 200)->nullable();
            $table->string('fuma_sn', 200)->nullable();
            $table->string('alcohol_sn', 200)->nullable();
            $table->string('act_fisica_sn', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_morbidos');
    }
}
