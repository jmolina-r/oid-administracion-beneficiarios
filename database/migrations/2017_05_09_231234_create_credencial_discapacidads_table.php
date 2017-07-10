<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCredencialDiscapacidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credencial_discapacidads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha_vencimiento')->nullable();
            $table->boolean('en_tramite');
            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('credencial_discapacidads', function($table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('credencial_discapacidads');
    }
}
