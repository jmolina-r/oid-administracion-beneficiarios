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
        Schema::create('antecedentes_perinatales_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('tipo_parto',200)->nullable();
            $table->string('suf_fetal',200)->nullable();
            $table->string('edad_gest',200)->nullable();
            $table->string('lugar_naci',200)->nullable();
            $table->string('peso',200)->nullable();
            $table->string('talla',200)->nullable();
            $table->string('apgar',200)->nullable();
            $table->string('comp_parto',200)->nullable();
            $table->string('hospitalizaciones',200)->nullable();
            $table->string('otros_perinatales',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_perinatales_fonos');
    }
}
