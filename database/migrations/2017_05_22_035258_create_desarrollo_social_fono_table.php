<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesarrolloSocialFonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_social_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('respeta_normas',200)->nullable();
            $table->string('comparte_juguetes',200)->nullable();
            $table->string('juega_otros',200)->nullable();
            $table->string('carinoso',200)->nullable();
            $table->string('berrinches',200)->nullable();
            $table->string('frustra_facil',200)->nullable();
            $table->string('irritable',200)->nullable();
            $table->string('agresivo',200)->nullable();
            $table->string('peleador',200)->nullable();
            $table->string('intereses',200)->nullable();
            $table->string('observaciones_social',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollo_social_fonos');
    }
}
