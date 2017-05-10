<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('numero');
            $table->date('fecha_ingreso');

            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('ficha_beneficiarios', function($table) {
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
        Schema::dropIfExists('ficha_beneficiarios');
    }
}
