<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaEducacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_educacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('estado', 20)->nullable();

            $table->string('categ_coordinacion', 10)->nullable();
            $table->string('categ_lenguaje', 10)->nullable();
            $table->string('categ_motricidad', 10)->nullable();
            $table->string('categ', 10)->nullable();

            $table->integer('total_coordinacion')->unsigned()->nullable();
            $table->integer('total_lenguaje')->unsigned()->nullable();
            $table->integer('total_motricidad')->unsigned()->nullable();
            $table->integer('total')->unsigned()->nullable();
            $table->integer('pt_coordinacion')->unsigned()->nullable();
            $table->integer('pt_lenguaje')->unsigned()->nullable();
            $table->integer('pt_motricidad')->unsigned()->nullable();
            $table->integer('pt')->unsigned()->nullable();
            $table->string('observacion', 600)->nullable();

            $table->integer('edad')->unsigned();
            $table->integer('meses')->unsigned();
            $table->integer('dias')->unsigned();

            $table->integer('funcionario_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
            $table->integer('test_coordinacion_id')->unsigned()->nullable();
            $table->integer('test_lenguaje_id')->unsigned()->nullable();
            $table->integer('test_motricidad_id')->unsigned()->nullable();

        });

        Schema::table('ficha_educacions', function ($table) {
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });

        Schema::table('ficha_educacions', function ($table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
        });
        Schema::table('ficha_educacions', function ($table) {
            $table->foreign('test_coordinacion_id')->references('id')->on('test_coordinacions');
        });
        Schema::table('ficha_educacions', function ($table) {
            $table->foreign('test_lenguaje_id')->references('id')->on('test_lenguajes');
        });
        Schema::table('ficha_educacions', function ($table) {
            $table->foreign('test_motricidad_id')->references('id')->on('test_motricidads');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_educacions');
    }

}
