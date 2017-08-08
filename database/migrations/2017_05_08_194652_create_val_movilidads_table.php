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
            $table->string('puntaje_trans_cama_silla', 1)->nullable();
            $table->string('coment_trans_cama_silla', 200)->nullable();
            $table->string('puntaje_traslado_bano', 1)->nullable();
            $table->string('coment_traslado_bano', 200)->nullable();
            $table->string('puntaje_traslado_ducha', 1)->nullable();
            $table->string('coment_traslado_ducha', 200)->nullable();
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
