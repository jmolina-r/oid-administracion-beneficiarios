<?php

use Illuminate\Database\Seeder;

class DomicilioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i=1; $i <= 150; $i++) {
            $domicilio = new \App\Domicilio([
                'pobl_vill' => $faker->streetName,
                'calle' => $faker->streetName,
                'numero' => $faker->buildingNumber,
                'bloque' => $faker->regexify('[1-9A-Z]{3}'),
                'numero_depto' => $faker->buildingNumber,
                'beneficiario_id' => $i
            ]);
            $domicilio->save();
        }
    }
}
