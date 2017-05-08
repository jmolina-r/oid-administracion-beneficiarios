<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoKinesiologiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso_kinesiologias', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('diagnostico');
            $table->string('motivo_consulta');
            $table->string('situacion_laboral');
            $table->string('situacion_familiar');
            $table->string('asiste_centro_rhb');

            $table->integer('id_antecedentes_morbidos')->unsigned();
            $table->integer('id_val_motora')->unsigned();
            $table->integer('id_val_deambulacion')->unsigned();
            $table->integer('id_val_movilidad')->unsigned();
            $table->integer('id_val_social')->unsigned();
            $table->integer('id_val_autocuidado')->unsigned();
            $table->integer('id_val_sensorial')->unsigned();
            $table->integer('id_val_com_cog')->unsigned();
            $table->integer('id_val_evaluacion')->unsigned();
            $table->integer('id_val_control_esfinter')->unsigned();
            $table->integer('id_kinesiologo')->unsigned();
            $table->integer('id_beneficiario')->unsigned();
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_antecedentes_morbidos')->references('id')->on('antecedentes_morbidos');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_motora')->references('id')->on('val_motora');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_deambulacion')->references('id')->on('val_deambulacion');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_movilidad')->references('id')->on('val_movilidad');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_social')->references('id')->on('val_social');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_autocuidado')->references('id')->on('val_autocuidado');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_sensorial')->references('id')->on('val_sensorial');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_com_cog')->references('id')->on('val_com_cog');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_evaluacion')->references('id')->on('val_evaluacion');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_val_control_esfinter')->references('id')->on('val_control_esfinter');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_kinesiologo')->references('id')->on('kinesiologo');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('id_beneficiario')->references('id')->on('beneficiario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingreso_kinesiologias');
    }
}
