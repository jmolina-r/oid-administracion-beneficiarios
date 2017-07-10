<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAntecedentesMorbidosFamiliaresSiNoFonosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antecedentes_morbidos_familiares_si_no_fonos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('diabetes_sn')->nullable();
            $table->string('hipertension_sn')->nullable();
            $table->string('epilepsia_sn')->nullable();
            $table->string('deficiencia_mental_sn')->nullable();
            $table->string('autismo_sn')->nullable();
            $table->string('trast_lenguaje_sn')->nullable();
            $table->string('trast_aprendizaje_sn')->nullable();
            $table->string('trast_visuales_sn')->nullable();
            $table->string('trast_auditivos_sn')->nullable();
            $table->string('trast_psiquiatricos_sn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antecedentes_morbidos_familiares_si_no_fonos');
    }
}
