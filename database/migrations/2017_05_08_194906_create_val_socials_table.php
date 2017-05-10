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
            $table->string('puntaje_int_social')->nullable();
            $table->string('coment_int_social')->nullable();
            $table->string('puntaje_sol_problemas')->nullable();
            $table->string('coment_sol_problemas')->nullable();
            $table->string('puntaje_memoria')->nullable();
            $table->string('coment_memoria')->nullable();
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
