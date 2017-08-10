<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValControlEsfintersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_control_esfinters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('puntaje_control_vejiga', 1)->nullable();
            $table->string('coment_control_vejiga', 200)->nullable();
            $table->string('puntaje_control_intestino', 1)->nullable();
            $table->string('coment_control_intestino', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_control_esfinters');
    }
}
