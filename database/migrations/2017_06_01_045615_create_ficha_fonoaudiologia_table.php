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
        Schema::create('ficha_fonoaudiologias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('motivo_consulta')->nullable();
            $table->integer('habitos_si_no_id')->unsigned();
            $table->integer('antecedentes_peri_fono_id')->unsigned();
            $table->integer('antecedentes_pre_fono_id')->unsigned();
            $table->integer('desarrollo_psi_ed_id')->unsigned();
            $table->integer('desarrollo_social_fono_id')->unsigned();
            $table->integer('antecedentes_mor_fono_id')->unsigned();
            $table->integer('antecedentes_mor_fa_fono_id')->unsigned();
            $table->integer('antecedentes_pos_fono_id')->unsigned();
            $table->integer('desarrollo_le_ed_id')->unsigned();
            $table->integer('parientes_hogar_fono_id')->unsigned();
            $table->integer('user_id')->unsigned();
        });


        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('habitos_si_no_id')->references('id')->on('habitos_sino_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('antecedentes_peri_fono_id')->references('id')->on('antecedentes_perinatales_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('antecedentes_pre_fono_id')->references('id')->on('antecedentes_prenatales_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('desarrollo_psi_ed_id')->references('id')->on('desarrollo_psicomotor_edades');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('desarrollo_social_fono_id')->references('id')->on('desarrollo_social_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('antecedentes_mor_fono_id')->references('id')->on('antecedentes_morbidos_sino_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('antecedentes_mor_fa_fono_id')->references('id')->on('antecedentes_morbidos_familiares_si_no_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('antecedentes_pos_fono_id')->references('id')->on('antecedentes_postnatales_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('desarrollo_le_ed_id')->references('id')->on('desarrollo_lenguaje_edades');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('parientes_hogar_fono_id')->references('id')->on('pariente_hogar_fonos');
        });

        Schema::table('ficha_fonoaudiologias', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_fonoaudiologias');
    }
}
