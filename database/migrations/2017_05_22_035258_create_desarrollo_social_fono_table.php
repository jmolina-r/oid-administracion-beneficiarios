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
        Schema::create('desarrollo_social_fono', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('respeta_normas')->nullable();
            $table->string('comparte_juguetes')->nullable();
            $table->string('juega_otros')->nullable();
            $table->string('carinoso')->nullable();
            $table->string('berrinches')->nullable();
            $table->string('frustra_facil')->nullable();
            $table->string('irritable')->nullable();
            $table->string('agresivo')->nullable();
            $table->string('peleador')->nullable();
            $table->string('intereses')->nullable();
            $table->string('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desarrollo_social_fono');
    }
}
