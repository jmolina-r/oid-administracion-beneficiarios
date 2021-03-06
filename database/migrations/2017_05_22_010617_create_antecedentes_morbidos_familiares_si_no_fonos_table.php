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
            $table->string('diabetes_sn_mor_fa',200)->nullable();
            $table->string('hipertension_sn',200)->nullable();
            $table->string('epilepsia_sn_mor_fa',200)->nullable();
            $table->string('deficiencia_mental_sn',200)->nullable();
            $table->string('autismo_sn',200)->nullable();
            $table->string('trast_lenguaje_sn',200)->nullable();
            $table->string('trast_aprendizaje_sn',200)->nullable();
            $table->string('trast_visuales_sn',200)->nullable();
            $table->string('trast_auditivos_sn',200)->nullable();
            $table->string('trast_psiquiatricos_sn',200)->nullable();
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
