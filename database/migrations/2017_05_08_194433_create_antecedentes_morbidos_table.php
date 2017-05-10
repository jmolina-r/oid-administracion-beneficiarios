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
            $table->string('pat_concom')->nullable();
            $table->string('alergias')->nullable();
            $table->string('medicamentos')->nullable();
            $table->string('ant_quir')->nullable();
            $table->string('aparatos')->nullable();
            $table->string('fuma_sn')->nullable();
            $table->string('alcohol_sn')->nullable();
            $table->string('act_fisica_sn')->nullable();
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
