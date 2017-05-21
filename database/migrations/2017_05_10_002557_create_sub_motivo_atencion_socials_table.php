<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubMotivoAtencionSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_motivo_atencion_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->date('fecha');
            $table->string('observacion');

            $table->integer('motivo_atencion_social_id')->unsigned();
            $table->integer('tipo_submotivo_social_id')->unsigned();

        });
        Schema::table('sub_motivo_atencion_socials', function ($table){
            $table->foreign('motivo_atencion_social_id')->references('id')->on('motivo_atencion_socials')->onDelete('cascade');
            $table->foreign('tipo_submotivo_social_id')->references('id')->on('tipo_submotivo_socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_motivo_atencion_socials');
    }
}
