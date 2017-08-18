<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformeCierresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informe_cierres', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('desercion');
            $table->string('culmino_proceso');
            $table->string('observacion')->nullable();
            $table->string('ficha');
            $table->string('area');

            $table->integer('beneficiario_id')->unsigned()->nullable();

        });
        Schema::table('informe_cierres', function ($table){
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
        Schema::dropIfExists('informe_cierres');
    }
}
