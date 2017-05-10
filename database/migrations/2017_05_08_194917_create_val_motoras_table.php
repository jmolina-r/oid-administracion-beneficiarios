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
            $table->string('rom')->nullable();
            $table->string('fm')->nullable();
            $table->string('tono')->nullable();
            $table->string('dolor')->nullable();
            $table->string('hab_motrices')->nullable();
            $table->string('equilibrio')->nullable();
            $table->string('coordinacion')->nullable();
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
