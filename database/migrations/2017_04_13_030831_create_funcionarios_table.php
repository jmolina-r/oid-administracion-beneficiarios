<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuncionariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('rut')->unique();
            $table->string('nombre');
            $table->string('apellido');
            $table->bigInteger('telefono');
            $table->date('fecha_nacimiento');
            $table->string('direccion');
            $table->string('email');
            $table->integer('tipo_funcionario_id')->unsigned();

        });
        Schema::table('funcionarios', function($table) {
            $table->foreign('tipo_funcionario_id')->references('id')->on('tipo_funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('funcionarios');
    }
}
