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
        Schema::create('antecedentes_morbidos_sino_fono', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('alergias_sn')->nullable();
            $table->string('alergias_desc')->nullable();
            $table->string('obesidad_sn')->nullable();
            $table->string('obesidad_desc')->nullable();
            $table->string('otitis_sn')->nullable();
            $table->string('otitis_desc')->nullable();
            $table->string('diabetes_sn')->nullable();
            $table->string('diabetes_desc')->nullable();
            $table->string('cirugias_sn')->nullable();
            $table->string('cirugias_desc')->nullable();
            $table->string('traumatis_sn')->nullable();
            $table->string('traumatis_desc')->nullable();
            $table->string('epilepsia_sn')->nullable();
            $table->string('epilepsia_desc')->nullable();
            $table->string('deficit_visual_sn')->nullable();
            $table->string('deficit_visual_desc')->nullable();
            $table->string('deficit_auditivo_sn')->nullable();
            $table->string('deficit_auditivo_desc')->nullable();
            $table->string('paralisis_cerebral_sn')->nullable();
            $table->string('paralisis_cerebral_desc')->nullable();
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
        Schema::dropIfExists('antecedentes_morbidos_sino_fono');
    }
}
