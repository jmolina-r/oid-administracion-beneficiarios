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
        });

        Schema::table('dato_socials', function($table) {
            $table->foreign('ficha_beneficiario_id')->references('id')->on('ficha_beneficiarios')->onDelete('cascade');
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
