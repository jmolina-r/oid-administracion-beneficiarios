<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaTallersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_tallers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('estado', 200)->nullable();
            $table->string('nombre_taller',200)->nullable();
            $table->string('objetivo',600)->nullable();
            $table->integer('funcionario_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();

        });

        Schema::table('ficha_tallers', function ($table) {
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });

        Schema::table('ficha_tallers', function ($table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_tallers');
    }
}
