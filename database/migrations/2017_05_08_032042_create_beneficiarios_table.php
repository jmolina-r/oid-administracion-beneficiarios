<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nombre');
            $table->string('apellido');
            $table->date('fecha_nacimiento');
            $table->string('sexo');
            $table->string('rut', 250)->unique();

            $table->integer('pais_id')->unsigned();
            $table->integer('estado_civil_id')->unsigned();
            $table->integer('educacion_id')->unsigned();
            $table->integer('ocupacion_id')->unsigned()->nullable();

        });
        Schema::table('beneficiarios', function($table) {
            $table->foreign('pais_id')->references('id')->on('pais');
        });

        Schema::table('beneficiarios', function($table) {
            $table->foreign('estado_civil_id')->references('id')->on('estado_civils');
        });

        Schema::table('beneficiarios', function($table) {
            $table->foreign('educacion_id')->references('id')->on('educacions');
        });

        Schema::table('beneficiarios', function($table) {
            $table->foreign('ocupacion_id')->references('id')->on('ocupacions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beneficiarios');
    }
}
