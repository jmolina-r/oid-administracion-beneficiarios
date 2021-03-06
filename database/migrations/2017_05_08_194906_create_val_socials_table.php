<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_socials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('puntaje_int_social', 1)->nullable();
            $table->string('coment_int_social', 200)->nullable();
            $table->string('puntaje_sol_problemas', 1)->nullable();
            $table->string('coment_sol_problemas', 200)->nullable();
            $table->string('puntaje_memoria', 1)->nullable();
            $table->string('coment_memoria', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_socials');
    }
}
