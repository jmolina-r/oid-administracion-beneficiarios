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
            $table->string('observación');
            $table->date('fecha_visita');
            $table->string('documento');
            
            $table->integer('ficha_atencion_social_id')->unsigned();
            $table->integer('tipo_motivo_social_id')->unsigned();
            $table->integer('tipo_submotivo_id')->unsigned()->nullable();
            $table->integer('tipo_ayuda_id')->unsigned()->nullable();
        });
        Schema::table('motivo_atencion_socials', function ($table){
            $table->foreign('ficha_atencion_social_id')->references('id')->on('ficha_atencion_socials')->onDelete('cascade');
            $table->foreign('tipo_motivo_social_id')->references('id')->on('tipo_motivo_socials')->onDelete('cascade');
            $table->foreign('tipo_submotivo_id')->references('id')->on('tipo_submotivo_socials')->onDelete('cascade');
            $table->foreign('tipo_ayuda_id')->references('id')->on('tipo_ayuda_tecnico_socials')->onDelete('cascade');
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
