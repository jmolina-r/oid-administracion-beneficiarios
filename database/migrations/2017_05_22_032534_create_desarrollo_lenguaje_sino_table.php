<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesarrolloLenguajeSinoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_lenguaje_sino', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('mira_ojos')->nullable();
            $table->string('mira_labios')->nullable();
            $table->string('comunica_palabras')->nullable();
            $table->string('comunica_jergas')->nullable();
            $table->string('comunica_palabras_sueltas')->nullable();
            $table->string('comunica_gestos')->nullable();
            $table->string('entiende_dice')->nullable();
            $table->string('desconocidos_entienden')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollo_lenguaje_sino');
    }
}
