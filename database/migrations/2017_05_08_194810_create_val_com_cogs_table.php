<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValComCogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_com_cogs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('puntae_expresion')->nullable();
            $table->string('coment_expresion')->nullable();
            $table->string('puntaje_comprension')->nullable();
            $table->string('coment_comprension')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_com_cogs');
    }
}
