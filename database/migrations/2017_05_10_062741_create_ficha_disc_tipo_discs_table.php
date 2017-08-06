<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaDiscTipoDiscsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_disc_tipo_discs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('porcentaje');
            $table->integer('ficha_discapacidad_id')->unsigned();
            $table->integer('tipo_discapacidad_id')->unsigned();

        });

        Schema::table('ficha_disc_tipo_discs', function($table) {
            $table->foreign('ficha_discapacidad_id')->references('id')->on('ficha_discapacidads')->onDelete('cascade');
        });

        Schema::table('ficha_disc_tipo_discs', function($table) {
            $table->foreign('tipo_discapacidad_id')->references('id')->on('tipo_discapacidads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_disc_tipo_discs');
    }
}
