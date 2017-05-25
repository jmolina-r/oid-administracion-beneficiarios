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
        Schema::create('habitos_sino_fono', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('mamadera')->nullable();
            $table->string('chupete')->nullable();
            $table->string('chupa_dedo')->nullable();
            $table->string('come_solo_tipo')->nullable();
            $table->string('viste_solo')->nullable();
            $table->string('boca_abierta_dia')->nullable();
            $table->string('boca_abierta_noche')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitos_sino_fono');
    }
}
