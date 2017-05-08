<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValMotorasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_motoras', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('rom');
            $table->string('fm');
            $table->string('tono');
            $table->string('dolor');
            $table->string('hab_motrices');
            $table->string('equilibrio');
            $table->string('coordinacion');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_motoras');
    }
}
