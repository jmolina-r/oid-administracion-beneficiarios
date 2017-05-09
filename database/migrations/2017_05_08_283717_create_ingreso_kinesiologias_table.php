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

            $table->integer('antecedentes_morbidos_id')->unsigned();
            $table->integer('val_motora_id')->unsigned();
            $table->integer('val_deambulacion_id')->unsigned();
            $table->integer('val_movilidad_id')->unsigned();
            $table->integer('val_social_id')->unsigned();
            $table->integer('val_autocuidado_id')->unsigned();
            $table->integer('val_sensorial_id')->unsigned();
            $table->integer('val_com_cog_id')->unsigned();
            $table->integer('val_evaluacion_id')->unsigned();
            $table->integer('val_control_esfinter_id')->unsigned();
            $table->integer('kinesiologo_id')->unsigned();
            $table->integer('beneficiario_id')->unsigned();
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('antecedentes_morbidos_id')->references('id')->on('antecedentes_morbidos');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_motora_id')->references('id')->on('val_motoras');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_deambulacion_id')->references('id')->on('val_deambulacions');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_movilidad_id')->references('id')->on('val_movilidads');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_social_id')->references('id')->on('val_socials');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_autocuidado_id')->references('id')->on('val_autocuidados');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_sensorial_id')->references('id')->on('val_sensorials');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_com_cog_id')->references('id')->on('val_com_cogs');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_evaluacion_id')->references('id')->on('val_evaluacions');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('val_control_esfinter_id')->references('id')->on('val_control_esfinters');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('kinesiologo_id')->references('id')->on('kinesiologos');
        });

        Schema::table('ingreso_kinesiologias', function($table) {
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios');
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
