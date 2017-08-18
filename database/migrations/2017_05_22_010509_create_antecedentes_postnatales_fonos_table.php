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
            $table->string('trat_post_parto',200)->nullable();
            $table->string('tipo_alimenta',200)->nullable();
            $table->string('limite_edad_alimenta',200)->nullable();
            $table->string('observaciones_postnatales',200)->nullable();
            $table->string('operaciones_edad',200)->nullable();
            $table->string('hospitalizaciones_edad',200)->nullable();
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
