<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyudaTecnicoSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayuda_tecnico_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->string('tipo');
            $table->string('descripcion');

            $table->integer('motivo_atencion_social_id')->unsigned();
        });
        Schema::table('ayuda_tecnico_socials', function ($table){
            $table->foreign('motivo_atencion_social_id')->references('id')->on('motivo_atencion_socials')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ayuda_tecnico_socials');
    }
}
