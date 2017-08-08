<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValAutocuidadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_autocuidados', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('puntaje_alimentacion', 1)->nullable();
            $table->string('coment_alimentacion', 200)->nullable();
            $table->string('puntaje_arreglo_pers', 1)->nullable();
            $table->string('coment_arreglo_pers', 200)->nullable();
            $table->string('puntaje_bano', 1)->nullable();
            $table->string('coment_bano', 200)->nullable();
            $table->string('puntaje_vest_sup', 1)->nullable();
            $table->string('coment_vest_sup', 200)->nullable();
            $table->string('puntaje_vest_inf', 1)->nullable();
            $table->string('coment_vest_inf', 200)->nullable();
            $table->string('puntaje_aseo_pers', 1)->nullable();
            $table->string('coment_aseo_pers', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_autocuidados');
    }
}
