<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesarrolloPsicomotorEdadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_psicomotor_edades', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('control_cabeza',200)->nullable();
            $table->string('sento',200)->nullable();
            $table->string('paro',200)->nullable();
            $table->string('gateo',200)->nullable();
            $table->string('camino',200)->nullable();
            $table->string('control_esf_diurno',200)->nullable();
            $table->string('control_esf_nocturno',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollo_psicomotor_edades');
    }
}
