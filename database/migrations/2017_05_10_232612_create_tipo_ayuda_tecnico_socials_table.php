<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTipoAyudaTecnicoSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_ayuda_tecnico_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo');
            $table->string('nombre');
        
            $table->integer('tipo_motivo_social_id')->unsigned();
        });
        Schema::table('tipo_ayuda_tecnico_socials', function ($table){
            $table->foreign('tipo_motivo_social_id')->references('id')->on('tipo_motivo_socials')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_ayuda_tecnico_socials');
    }
}
