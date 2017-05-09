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
            $table->string('pat_concom');
            $table->string('alergias');
            $table->string('medicamentos');
            $table->string('ant_quir');
            $table->string('aparatos');
            $table->string('fuma_sn');
            $table->string('alcohol_sn');
            $table->string('act_fisica_sn');
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
