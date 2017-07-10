<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomiciliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domicilios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('pobl_vill')->nullable();
            $table->string('calle');
            $table->integer('numero');
            $table->string('bloque')->nullable();
            $table->string('numero_depto')->nullable();

            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('domicilios', function($table) {
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
        Schema::dropIfExists('domicilios');
    }
}
