<?php

use Illuminate\Database\Seeder;

class DatoSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i=1; $i <= 150; $i++) {
            $datoSocial = new \App\DatoSocial([
                'observacion' => $faker->text,
                'ficha_beneficiario_id' => $i
            ]);
            $datoSocial->save();
        }
    }
}
