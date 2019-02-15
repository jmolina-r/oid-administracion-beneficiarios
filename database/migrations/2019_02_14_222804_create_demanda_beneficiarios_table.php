<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandaBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demanda_beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('demanda_id')->nullable();
            $table->unsignedInteger('beneficiario_id')->nullable();

        });

        Schema::table('demanda_beneficiarios', function($table) {
            $table->foreign('demanda_id')->references('id')->on('demandas');
        });

        Schema::table('demanda_beneficiarios', function($table) {
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
        Schema::dropIfExists('demanda_beneficiarios');
    }
}
