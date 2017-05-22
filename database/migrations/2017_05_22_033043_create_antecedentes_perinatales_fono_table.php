<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesPerinatalesFonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_perinatales_fono', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_parto')->nullable();
            $table->string('suf_fetal')->nullable();
            $table->string('edad_gest')->nullable();
            $table->string('lugar_naci')->nullable();
            $table->string('peso')->nullable();
            $table->string('talla')->nullable();
            $table->string('apgar')->nullable();
            $table->string('comp_parto')->nullable();
            $table->string('hospitalizaciones')->nullable();
            $table->string('otros')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_perinatales_fono');
    }
}
