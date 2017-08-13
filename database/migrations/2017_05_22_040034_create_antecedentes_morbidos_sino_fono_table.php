<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesMorbidosSinoFonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_morbidos_sino_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('alergias_sn',200)->nullable();
            $table->string('alergias_desc',200)->nullable();
            $table->string('obesidad_sn',200)->nullable();
            $table->string('obesidad_desc',200)->nullable();
            $table->string('otitis_sn',200)->nullable();
            $table->string('otitis_desc',200)->nullable();
            $table->string('diabetes_sn',200)->nullable();
            $table->string('diabetes_desc',200)->nullable();
            $table->string('cirugias_sn',200)->nullable();
            $table->string('cirugias_desc',200)->nullable();
            $table->string('traumatis_sn',200)->nullable();
            $table->string('traumatis_desc',200)->nullable();
            $table->string('epilepsia_sn',200)->nullable();
            $table->string('epilepsia_desc',200)->nullable();
            $table->string('deficit_visual_sn',200)->nullable();
            $table->string('deficit_visual_desc',200)->nullable();
            $table->string('deficit_auditivo_sn',200)->nullable();
            $table->string('deficit_auditivo_desc',200)->nullable();
            $table->string('paralisis_cerebral_sn',200)->nullable();
            $table->string('paralisis_cerebral_desc',200)->nullable();
            $table->string('otros_morbidos',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_morbidos_sino_fonos');
    }
}
