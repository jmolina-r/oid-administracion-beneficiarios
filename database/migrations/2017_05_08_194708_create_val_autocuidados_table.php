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
            $table->string('puntaje_alimentacion')->nullable();
            $table->string('coment_alimentacion')->nullable();
            $table->string('puntaje_arreglo_pers')->nullable();
            $table->string('coment_arreglo_pers')->nullable();
            $table->string('puntaje_bano')->nullable();
            $table->string('coment_bano')->nullable();
            $table->string('puntaje_vest_sup')->nullable();
            $table->string('coment_vest_sup')->nullable();
            $table->string('puntaje_vest_inf')->nullable();
            $table->string('coment_vest_inf')->nullable();
            $table->string('puntaje_aseo_pers')->nullable();
            $table->string('coment_aseo_pers')->nullable();
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
