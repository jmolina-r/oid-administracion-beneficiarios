<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCoordinacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('test_coordinacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('traslada',200)->nullable();
            $table->string('construye_puente',200)->nullable();
            $table->string('construye_torre',200)->nullable();
            $table->string('desabotona',200)->nullable();
            $table->string('abotona',200)->nullable();
            $table->string('enhebra',200)->nullable();
            $table->string('desata',200)->nullable();
            $table->string('copia_recta',200)->nullable();
            $table->string('copia_circulo',200)->nullable();
            $table->string('copia_cruz',200)->nullable();
            $table->string('copia_triang',200)->nullable();
            $table->string('copia_cuadra',200)->nullable();
            $table->string('dibuja_9',200)->nullable();
            $table->string('dibuja_6',200)->nullable();
            $table->string('dibuja_3',200)->nullable();
            $table->string('dibuja_',200)->nullable();
            $table->string('ordena',200)->nullable();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_coordinacions');

    }
}
