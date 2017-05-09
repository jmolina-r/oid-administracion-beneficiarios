<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValMovilidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_movilidads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('puntaje_trans_cama_silla');
            $table->string('coment_trans_cama_silla');
            $table->string('puntaje_traslado_bano');
            $table->string('coment_traslado_bano');
            $table->string('puntaje_traslado_ducha');
            $table->string('coment_traslado_ducha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_movilidads');
    }
}
