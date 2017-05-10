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
            $isFonasa = $faker->boolean;
            if($isFonasa == true) {
                $fonasa = $faker->numberBetween($min = 1, $max = 4);
                $isapre = null;
            } else {
                $isapre = $faker->numberBetween($min = 1, $max = 10);
                $fonasa = null;
            }
            if($faker->boolean == true) {
                $organizacionSocial = $faker->numberBetween($min = 1, $max = 3);
            } else {
                $organizacionSocial = null;
            }
            if($faker->boolean == true) {
                $sistemaProteccion = $faker->numberBetween($min = 1, $max = 3);
            } else {
                $sistemaProteccion = null;
            }
            $datoSocial = new \App\DatoSocial([
                'observacion' => $faker->text,
                'ficha_beneficiario_id' => $i,
                'isapre_id' => $isapre,
                'fonasa_id' => $fonasa,
                'organizacion_social_id' => $organizacionSocial,
                'sistema_proteccion_id' => $sistemaProteccion
            ]);
            $datoSocial->save();
        }
    }
}
