<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrestacionRealizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacion_realizadas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha');

            $table->integer('funcionario_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('prestacions_id')->unsigned();
        });

        Schema::table('prestacion_realizadas', function ($table){
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('prestacion_realizadas', function ($table){
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });

        Schema::table('prestacion_realizadas', function ($table){
            $table->foreign('prestacions_id')->references('id')->on('prestacions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestacion_realizadas');
    }
}
