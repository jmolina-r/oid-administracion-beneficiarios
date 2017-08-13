<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHabitosSinoFonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitos_sino_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('mamadera',200)->nullable();
            $table->string('chupete',200)->nullable();
            $table->string('chupa_dedo',200)->nullable();
            $table->string('come_solo_tipo',200)->nullable();
            $table->string('viste_solo',200)->nullable();
            $table->string('boca_abierta_dia',200)->nullable();
            $table->string('boca_abierta_noche',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitos_sino_fonos');
    }
}
