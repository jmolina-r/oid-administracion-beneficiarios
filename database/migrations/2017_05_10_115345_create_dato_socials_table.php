<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatoSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dato_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->longText('observacion');

            $table->integer('ficha_beneficiario_id')->unsigned();
            $table->integer('isapre_id')->unsigned()->nullable();
            $table->integer('fonasa_id')->unsigned()->nullable();
        });

        Schema::table('dato_socials', function($table) {
            $table->foreign('ficha_beneficiario_id')->references('id')->on('ficha_beneficiarios')->onDelete('cascade');
        });
        Schema::table('dato_socials', function($table) {
            echo('hola');
            $table->foreign('isapre_id')->references('id')->on('isapres');
            echo('hola2');

        });
        Schema::table('dato_socials', function($table) {
            $table->foreign('fonasa_id')->references('id')->on('fonasas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dato_socials');
    }
}