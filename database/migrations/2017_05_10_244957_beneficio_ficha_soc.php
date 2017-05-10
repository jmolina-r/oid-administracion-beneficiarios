<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeneficioFichaSoc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficio_dato_social', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('beneficio_id')->unsigned();
            $table->foreign('beneficio_id')->references('id')->on('beneficios');

            $table->integer('dato_social_id')->unsigned();
            $table->foreign('dato_social_id')->references('id')->on('dato_socials');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('beneficio_dato_social');
    }
}
