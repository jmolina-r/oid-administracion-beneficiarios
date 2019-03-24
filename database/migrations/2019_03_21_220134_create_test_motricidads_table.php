<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestMotricidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_motricidads', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('salta',200)->nullable();
            $table->string('camina',200)->nullable();
            $table->string('lanza',200)->nullable();
            $table->string('para_10',200)->nullable();
            $table->string('para_5',200)->nullable();
            $table->string('para_1',200)->nullable();
            $table->string('camina_punta',200)->nullable();
            $table->string('salta_20',200)->nullable();
            $table->string('salta_3',200)->nullable();
            $table->string('coge',200)->nullable();
            $table->string('camina_adelante',200)->nullable();
            $table->string('camina_atras',200)->nullable();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_motricidads');

    }
}
