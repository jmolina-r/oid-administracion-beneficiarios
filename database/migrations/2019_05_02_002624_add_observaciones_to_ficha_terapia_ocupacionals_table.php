<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddObservacionesToFichaTerapiaOcupacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ficha_terapia_ocupacionals', function (Blueprint $table) {
            //
            $table->text('observaciones')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ficha_terapia_ocupacionals', function (Blueprint $table) {
            //
            $table->dropColumn('observaciones');
        });
    }
}
