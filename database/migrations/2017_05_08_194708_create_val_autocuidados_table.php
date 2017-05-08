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
            $table->string('puntaje_alimentacion');
            $table->string('coment_alimentacion');
            $table->string('puntae_arreglo_pers');
            $table->string('coment_arreglo_pers');
            $table->string('puntaje_bano');
            $table->string('coment_bano');
            $table->string('puntaje_vest_sup');
            $table->string('coment_vest_sup');
            $table->string('puntaje_vest_inf');
            $table->string('coment_vest_inf');
            $table->string('puntaje_aseo_pers');
            $table->string('coment_aseo_pers');
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
