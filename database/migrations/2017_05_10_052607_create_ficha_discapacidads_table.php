<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaDiscapacidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_discapacidads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('requiere_cuidado');
            $table->longText('diagnostico')->nullable();
            $table->longText('otras_enfermedades')->nullable();

            $table->integer('ficha_beneficiario_id')->unsigned();
            $table->integer('tipo_dependencia_id')->unsigned();

        });

        Schema::table('ficha_discapacidads', function($table) {
            $table->foreign('ficha_beneficiario_id')->references('id')->on('ficha_beneficiarios')->onDelete('cascade');
        });

        Schema::table('ficha_discapacidads', function($table) {
            $table->foreign('tipo_dependencia_id')->references('id')->on('tipo_dependencias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_discapacidads');
    }
}
