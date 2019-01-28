<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoraAgendadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hora_agendadas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //$table->integer('beneficiario_id')->unsigned();
            $table->string('tipo');
            $table->string('asist_sn');
            $table->string('hora');
            $table->string('fecha');
            $table->string('razon_inasis');
            $table->integer('user_id')->unsigned();
            $table->softDeletes();
        });

        //Schema::table('hora_agendadas', function($table) {
        //    $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
        //});

        Schema::table('hora_agendadas', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hora_agendadas');
    }
}
