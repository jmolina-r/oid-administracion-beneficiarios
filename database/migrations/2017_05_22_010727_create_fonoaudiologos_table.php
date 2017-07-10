<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFonoaudiologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fonoaudiologos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('rut');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('fecha_nacimiento')->nullable();
            $table->string('direccion')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fonoaudiologos');
    }
}
