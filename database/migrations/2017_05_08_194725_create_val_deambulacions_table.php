<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValdeambulacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_deambulacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('puntaje_desp_caminando', 1)->nullable();
            $table->string('coment_desp_caminando', 200)->nullable();
            $table->string('puntaje_escaleras', 1)->nullable();
            $table->string('coment_escaleras', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_deambulacions');
    }
}
