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
