<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKinesiologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kinesiologos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('rut');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kinesiologos');
    }
}
