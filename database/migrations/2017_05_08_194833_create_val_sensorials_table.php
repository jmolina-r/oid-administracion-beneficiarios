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
            $table->string('visual', 200)->nullable();
            $table->string('auditivo', 200)->nullable();
            $table->string('tactil', 200)->nullable();
            $table->string('propioceptivo', 200)->nullable();
            $table->string('vestibular', 200)->nullable();
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
