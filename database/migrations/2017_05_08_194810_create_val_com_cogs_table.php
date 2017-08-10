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
            $table->string('puntaje_expresion', 1)->nullable();
            $table->string('coment_expresion', 200)->nullable();
            $table->string('puntaje_comprension', 1)->nullable();
            $table->string('coment_comprension', 200)->nullable();
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
