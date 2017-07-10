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
            $table->string('control_cabeza')->nullable();
            $table->string('sento')->nullable();
            $table->string('paro')->nullable();
            $table->string('camino')->nullable();
            $table->string('control_esf_diurno')->nullable();
            $table->string('control_esf_nocturno')->nullable();
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
