<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesPostnatalesFonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_postnatales_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('trat_post_parto')->nullable();
            $table->string('tipo_alimenta')->nullable();
            $table->string('limite_edad_alimenta')->nullable();
            $table->string('observaciones')->nullable();
            $table->string('operaciones_edad')->nullable();
            $table->string('hospitalizaciones_edad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_postnatales_fonos');
    }
}
