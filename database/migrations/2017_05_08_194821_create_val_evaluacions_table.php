<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValEvaluacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_evaluacions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('conexion_medio')->nullable();
            $table->string('nivel_cognitivo_apar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_evaluacions');
    }
}
