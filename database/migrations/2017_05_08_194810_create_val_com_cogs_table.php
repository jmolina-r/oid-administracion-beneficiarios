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
            $table->string('puntae_expresion');
            $table->string('coment_expresion');
            $table->string('puntaje_comprension');
            $table->string('coment_comprension');
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
