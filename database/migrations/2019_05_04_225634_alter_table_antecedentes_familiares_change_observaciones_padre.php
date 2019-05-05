<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableAntecedentesFamiliaresChangeObservacionesPadre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('antecedentes_familiares', function (Blueprint $table) {
            $table->text('observaciones_padre')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('antecedentes_familiares', function (Blueprint $table) {
            $table->dropColumn('observaciones_padre');
        });
    }
}
