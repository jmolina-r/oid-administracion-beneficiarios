<?php

use Illuminate\Database\Seeder;

class FichaBeneficiarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $fichaBeneficiario = new App\FichaBeneficiario([
            'fecha_ingreso' => $faker->date('y-m-d','now'),
            'beneficiario_id' => '1'
        ]);
        $fichaBeneficiario->save();
        // for ($i=1; $i <= 150; $i++) {
        //     $fichaBeneficiario = new \App\FichaBeneficiario([
        //         //'numero' => $i,
        //         'fecha_ingreso' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = date_default_timezone_get()),
        //         'beneficiario_id' => $i
        //     ]);
        //     $fichaBeneficiario->save();
        // }

    }
}
