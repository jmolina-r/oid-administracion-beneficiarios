<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMallasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mallas', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->unsignedInteger('beneficiario_id')->nullable();
            $table->unsignedInteger('hora_agendada_id')->nullable();
            $table->softDeletes();
        });

        Schema::table('mallas', function($table) {
            $table->foreign('hora_agendada_id')->references('id')->on('hora_agendadas');
        });

        Schema::table('mallas', function($table) {
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
        Schema::dropIfExists('mallas');
    }
}
