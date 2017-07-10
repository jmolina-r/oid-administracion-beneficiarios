<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonoBeneficiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefono_beneficiarios', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('numero');
            $table->string('tipo');

            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('telefono_beneficiarios', function($table) {
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
        Schema::dropIfExists('telefono_beneficiarios');
    }
}
