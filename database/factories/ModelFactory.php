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
        'rut' => $faker->regexify('\[1-9]{8,9}\-(k|[0-9])'),
        'pais_id' => $faker->numberBetween($min = 1, $max = 70)
    ];
});

$factory->define(App\Telefono::class, function (Faker\Generator $faker) {

    return [
        'numero' => $faker->regexify('[0-9]{8}'),
        'tipo' => $faker->regexify('(movil|fijo)'),
        'beneficiario_id' => $faker->numberBetween($min = 1, $max = 150)
    ];
});

$factory->define(App\Beneficiario::class, function (Faker\Generator $faker) {

    return [
        'diagnostico' => $faker -> word,
        'motivo_consulta' => $faker -> sentence,
        'situacion_laboral' => $faker -> jobTitle,
        'situacion_familiar' => $faker -> word,
        'asiste_centro_rhb' => $faker -> boolean,
        'id_antecedentes_morbidos' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_motora' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_deambulacion' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_movilidad' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_social' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_autocuidado' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_sensorial' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_com_cog' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_evaluacion' => $faker -> numberBetween($min = 1, $max = 2),
        'id_val_control_esfinter' => $faker -> numberBetween($min = 1, $max = 2),
        'id_kinesiologo' => $faker -> numberBetween($min = 1, $max = 5),
        'id_beneficiario' => $faker -> numberBetween($min = 1, $max = 150),
    ];
});
