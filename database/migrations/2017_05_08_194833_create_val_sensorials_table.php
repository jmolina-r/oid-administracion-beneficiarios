<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValSensorialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('val_sensorials', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('visual')->nullable();
            $table->string('auditivo')->nullable();
            $table->string('tactil')->nullable();
            $table->string('propioceptivo')->nullable();
            $table->string('vestibular')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('val_sensorials');
    }
}
