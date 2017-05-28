<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelefonoTutorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telefono_tutors', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('numero');
            $table->string('tipo')->nullable();

            $table->integer('tutor_id')->unsigned();
        });

        Schema::table('telefono_tutors', function($table) {
            $table->foreign('tutor_id')->references('id')->on('tutors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('telefono_tutors');
    }
}
