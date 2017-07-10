<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DatoSocialOrganizacionSocial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_social_organizacion_social', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('organizacion_social_id')->unsigned();
            $table->foreign('organizacion_social_id')->references('id')->on('organizacion_socials');

            $table->integer('dato_social_id')->unsigned();
            $table->foreign('dato_social_id')->references('id')->on('dato_socials')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dato_social_organizacion_social');
    }
}
