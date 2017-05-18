<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistroSocialHogarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_social_hogars', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('en_tramite');
            $table->integer('porcentaje')->nullable();
            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('registro_social_hogars', function($table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_social_hogars');
    }
}
