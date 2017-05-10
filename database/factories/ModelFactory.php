<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
*/
$factory->define(App\Pais::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->country
    ];
});

$factory->define(App\Beneficiario::class, function (Faker\Generator $faker) {

    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'sexo' => $faker->regexify('(masculino|femenino)'),
        'rut' => $faker->unique()->regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'pais_id' => $faker->numberBetween($min = 1, $max = 70),
        'estado_civil_id' => $faker->numberBetween($min = 1, $max = 5),
        'educacion_id' => $faker->numberBetween($min = 1, $max = 9),
        'ocupacion_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});

$factory->define(App\Telefono::class, function (Faker\Generator $faker) {

    return [
        'numero' => $faker->unique()->regexify('[0-9]{8}'),
        'tipo' => $faker->regexify('(movil|fijo)'),
        'beneficiario_id' => $faker->numberBetween($min = 1, $max = 150)
    ];
});


$factory->define(App\Tutor::class, function (Faker\Generator $faker) {

    return [
        'nombres' => $faker->firstName,
        'apellidos' => $faker->lastName,
        'beneficiario_id' => $faker->unique()->numberBetween($min = 1, $max = 150)
    ];
});

$factory->define(App\CredencialDiscapacidad::class, function (Faker\Generator $faker) {
    return [
        'fecha_vencimiento' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 years', $timezone = date_default_timezone_get()),
        'beneficiario_id' => $faker->unique()->numberBetween($min = 1, $max = 150)
    ];
});

$factory->define(App\DatoSocial::class, function (Faker\Generator $faker) {
    return [
        'observacion' => $faker->text,
        'beneficiario_id' => $faker->unique()->numberBetween($min = 1, $max = 150)
    ];
});


/*

$factory->define(App\RegistroSocialHogar::class, function (Faker\Generator $faker) {

    $enTramite = $faker->boolean;

    if($enTramite == true) {
        $porcentaje = 0;
    } else {
        $porcentaje = $faker->numberBetween($min = 1, $max = 100);
    }
    return [
        'porcentaje' => $porcentaje,
        'en_tramite' => $enTramite,
        'beneficiario_id' => $faker->unique()->regexify('[1-60]')
    ];
});

*/


$factory->define(App\IngresoKinesiologia::class, function (Faker\Generator $faker) {

    return [
        'diagnostico' => $faker -> regexify('(SE DESCONOCE EL DIAGNOSTICO|DERRAME CEREBRAL|RETRASO MENTAL SEVERO|DISTROFIA MUSCULAR|DIABETES)'),
        'motivo_consulta' => $faker -> regexify('(Evaluación Movilidad|Evaluación Motora|Evaluación Social)'),
        'situacion_laboral' => $faker -> regexify('(Desempleado|Estudiante|Trabajando)'),
        'situacion_familiar' => $faker -> regexify('(Normal|Anormal)'),
        'asiste_centro_rhb' => $faker -> regexify('(Si|No)'),
        'antecedentes_morbidos_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_motora_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_deambulacion_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_movilidad_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_social_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_autocuidado_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_sensorial_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_com_cog_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_evaluacion_id' => $faker -> numberBetween($min = 1, $max = 2),
        'val_control_esfinter_id' => $faker -> numberBetween($min = 1, $max = 2),
        'kinesiologo_id' => $faker -> numberBetween($min = 1, $max = 3),
        'beneficiario_id' => $faker -> numberBetween($min = 1, $max = 150),
    ];
});

$factory->define(App\AntecedentesMorbidos::class, function (Faker\Generator $faker) {

    return [
        'pat_concom' => 'Patología',
        'alergias' => $faker -> regexify('(Respiratoria|Cutanea)'),
        'medicamentos' => $faker -> regexify('(Loratadina|otro)'),
        'ant_quir' => $faker -> regexify('(No|Cirugía)'),
        'aparatos' => $faker -> regexify('(Aparatos|No)'),
        'fuma_sn' => $faker -> regexify('(Si|No)'),
        'alcohol_sn' => $faker -> regexify('(Si|No)'),
        'act_fisica_sn' => $faker -> regexify('(Si|No)'),
    ];
});

$factory->define(App\Kinesiologo::class, function (Faker\Generator $faker) {

    return [
        'rut' => $faker -> regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'nombres' => $faker -> firstName,
        'apellidos' => $faker -> lastName,
        'telefono' => $faker -> regexify('[0-9]{8}'),
        'fecha_nacimiento' => $faker -> dateTimeBetween('-50 years', '-25 years'),
        'direccion' => $faker -> address,
    ];
});

$factory->define(App\ValAutocuidado::class, function (Faker\Generator $faker) {

    return [
        'puntaje_alimentacion' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_alimentacion' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_arreglo_pers' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_arreglo_pers' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_bano' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_bano' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_vest_sup' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_vest_sup' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_vest_inf' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_vest_inf' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_aseo_pers' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_aseo_pers' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValComCog::class, function (Faker\Generator $faker) {

    return [
        'puntae_expresion' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_expresion' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_comprension' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_comprension' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValControlEsfinter::class, function (Faker\Generator $faker) {

    return [
        'puntaje_control_vejiga' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_control_vejiga' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_control_intestino' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_control_intestino' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValDeambulacion::class, function (Faker\Generator $faker) {

    return [
        'puntaje_desp_caminando' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_desp_caminando' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntae_escaleras' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_escaleras' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValEvaluacion::class, function (Faker\Generator $faker) {

    return [
        'conexion_medio' => $faker -> regexify('(Normal|Disminuida)'),
        'nivel_cognitivo_apar' => $faker -> regexify('(Normal|Disminuido)'),
    ];
});

$factory->define(App\ValMotora::class, function (Faker\Generator $faker) {

    return [
        'rom' => $faker -> numberBetween($min = 1, $max = 5),
        'fm' => $faker -> numberBetween($min = 1, $max = 5),
        'tono' => $faker -> numberBetween($min = 1, $max = 5),
        'dolor' => $faker -> numberBetween($min = 1, $max = 5),
        'hab_motrices' => $faker -> numberBetween($min = 1, $max = 5),
        'equilibrio' => $faker -> numberBetween($min = 1, $max = 5),
        'coordinacion' => $faker -> numberBetween($min = 1, $max = 5),
    ];
});

$factory->define(App\ValMovilidad::class, function (Faker\Generator $faker) {

    return [
        'puntaje_trans_cama_silla' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_trans_cama_silla' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_traslado_bano' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_traslado_bano' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_traslado_ducha' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_traslado_ducha' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});

$factory->define(App\ValSensorial::class, function (Faker\Generator $faker) {

    return [
        'visual' => $faker -> numberBetween($min = 1, $max = 5),
        'auditivo' => $faker -> numberBetween($min = 1, $max = 5),
        'tactil' => $faker -> numberBetween($min = 1, $max = 5),
        'propioceptivo' => $faker -> numberBetween($min = 1, $max = 5),
        'vestibular' => $faker -> numberBetween($min = 1, $max = 5),
    ];
});

$factory->define(App\ValSocial::class, function (Faker\Generator $faker) {

    return [
        'puntaje_int_social' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_int_social' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_sol_problemas' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_sol_problemas' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
        'puntaje_memoria' => $faker -> numberBetween($min = 1, $max = 10),
        'coment_memoria' => $faker -> regexify('(|Comentarios varios sobre la puntuación obtenida)'),
    ];
});
