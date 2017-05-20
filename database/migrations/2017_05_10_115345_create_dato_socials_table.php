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
            $table->longText('observacion')->nullable();

            $table->integer('ficha_beneficiario_id')->unsigned();
            $table->integer('isapre_id')->unsigned()->nullable();
            $table->integer('fonasa_id')->unsigned()->nullable();
            $table->integer('sistema_proteccion_id')->unsigned()->nullable();

            $table->integer('prevision_id')->unsigned()->nullable();


        });

        Schema::table('dato_socials', function($table) {
            $table->foreign('ficha_beneficiario_id')->references('id')->on('ficha_beneficiarios')->onDelete('cascade');
        });
        Schema::table('dato_socials', function($table) {
            $table->foreign('isapre_id')->references('id')->on('isapres');
        });
        Schema::table('dato_socials', function($table) {
            $table->foreign('fonasa_id')->references('id')->on('fonasas');
        });
        Schema::table('dato_socials', function($table) {
            $table->foreign('sistema_proteccion_id')->references('id')->on('sistema_proteccions');
        });
        Schema::table('dato_socials', function($table) {
            $table->foreign('prevision_id')->references('id')->on('previsions');
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
