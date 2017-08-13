<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaFonoaudiologiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_fonoaudiologia', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('motivo_consulta')->nullable();

            $table->integer('habitos_sino_fono_id')->unsigned();
            $table->integer('antecedentes_perinatales_fono_id')->unsigned();
            $table->integer('antecedentes_prenatales_fono_id')->unsigned();
            $table->integer('desarrollo_psicomotor_edades_id')->unsigned();
            $table->integer('desarrollo_social_fono_id')->unsigned();
            $table->integer('antecedentes_morbidos_sino_fono_id')->unsigned();
            $table->integer('ant_morb_familiares_si_no_fonos_id')->unsigned();
            $table->integer('antecedentes_postnatales_fonos_id')->unsigned();
            $table->integer('desarrollo_lenguaje_edades_id')->unsigned();
            $table->integer('profesional_id')->unsigned();
            // $table->integer('fonoaudiologos_id')->unsigned();
        });


        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('habitos_sino_fono_id')->references('id')->on('habitos_sino_fono');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('antecedentes_perinatales_fono_id')->references('id')->on('antecedentes_perinatales_fono');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('antecedentes_prenatales_fono_id')->references('id')->on('antecedentes_prenatales_fono');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('desarrollo_psicomotor_edades_id')->references('id')->on('desarrollo_psicomotor_edades');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('desarrollo_social_fono_id')->references('id')->on('desarrollo_social_fono');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('antecedentes_morbidos_sino_fono_id')->references('id')->on('antecedentes_morbidos_sino_fono');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('ant_morb_familiares_si_no_fonos_id')->references('id')->on('antecedentes_morbidos_familiares_si_no_fonos');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('antecedentes_postnatales_fonos_id')->references('id')->on('antecedentes_postnatales_fonos');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('desarrollo_lenguaje_edades_id')->references('id')->on('desarrollo_lenguaje_edades');
        });

        Schema::table('ficha_fonoaudiologia', function($table) {
            $table->foreign('profesional_id')->references('id')->on('profesionals');
        });

        // Schema::table('ficha_fonoaudiologia', function($table) {
        //     $table->foreign('fonoaudiologos_id')->references('id')->on('fonoaudiologos');
        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_fonoaudiologia');
    }
}
