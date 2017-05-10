<?php

use Illuminate\Database\Seeder;

class RegistroSocialHogarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {

        $faker->unique($reset = true);
        for ($i=0; $i < 60; $i++) {
            $IdsRegSocialHog[] = $faker->unique()->numberBetween($min = 1, $max = 150);
        }

        for ($i=0; $i < 60; $i++) {
            $enTramite = $faker->boolean;

            if($enTramite == true) {
                $porcentaje = 0;
            } else {
                $porcentaje = $faker->numberBetween($min = 1, $max = 100);
            }
            $registroSocialHogar = new \App\RegistroSocialHogar([
                'porcentaje' => $porcentaje,
                'en_tramite' => $enTramite,
                'beneficiario_id' => $IdsRegSocialHog[$i]
            ]);
            $registroSocialHogar->save();

        }
        $faker->unique($reset=true);
    }
}
