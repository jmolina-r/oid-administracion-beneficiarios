<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotivoAtencionSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_atencion_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('descripcion');
            $table->string('nombre');

            $table->integer('ficha_atencion_social_id')->unsigned();
        });
        Schema::table('motivo_atencion_socials', function ($table){
            $table->foreign('ficha_atencion_social_id')->references('id')->on('ficha_atencion_socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motivo_atencion_socials');
    }
}
