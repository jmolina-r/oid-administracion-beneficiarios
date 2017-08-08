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
            $table->string('rom', 200)->nullable();
            $table->string('fm', 200)->nullable();
            $table->string('tono', 200)->nullable();
            $table->string('dolor', 200)->nullable();
            $table->string('hab_motrices', 200)->nullable();
            $table->string('equilibrio', 200)->nullable();
            $table->string('coordinacion', 200)->nullable();
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
