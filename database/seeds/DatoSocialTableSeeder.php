<?php

use Illuminate\Database\Seeder;

class DatoSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //factory(App\DatoSocial::class)->create([
        //    'observacion' => 'Este beneficiario es una prueba para el sistema, no tomar en cuenta',
        //    'ficha_beneficiario_id' => '1',
        //    'isapre_id' => '1',
        //    'fonasa_id' => null,
        //    'sistema_proteccion_id' => '1',
        //    'prevision_id' => null,
        //]);
        // for ($i=1; $i <= 150; $i++) {
        //     $isFonasa = $faker->boolean;
        //     if($isFonasa == true) {
        //         $fonasa = $faker->numberBetween($min = 1, $max = 4);
        //         $isapre = null;
        //     } else {
        //         $isapre = $faker->numberBetween($min = 1, $max = 10);
        //         $fonasa = null;
        //     }
        //     if($faker->boolean == true) {
        //         $sistemaProteccion = $faker->numberBetween($min = 1, $max = 3);
        //     } else {
        //         $sistemaProteccion = null;
        //     }
        //
        //     if($faker->boolean == true) {
        //         $prevision = $faker->numberBetween($min = 1, $max = 9);
        //     } else {
        //         $prevision = null;
        //     }
        //     $datoSocial = new \App\DatoSocial([
        //         'observacion' => $faker->text,
        //         'ficha_beneficiario_id' => $i,
        //         'isapre_id' => $isapre,
        //         'fonasa_id' => $fonasa,
        //         'sistema_proteccion_id' => $sistemaProteccion,
        //         'prevision_id' => $prevision
        //     ]);
        //     $datoSocial->save();
        // }
    }
}
