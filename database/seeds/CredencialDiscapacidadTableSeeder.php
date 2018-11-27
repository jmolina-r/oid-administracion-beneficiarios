<?php

use Illuminate\Database\Seeder;

class CredencialDiscapacidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\CredencialDiscapacidad::class)->create([
        //    'fecha_vencimiento' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 years', $timezone = date_default_timezone_get()),
        //    'en_tramite' => 0,
        //    'beneficiario_id' => '1'
        //]);
        // $faker->unique($reset = true);
        // for ($i=0; $i < 120; $i++) {
        //     $IdsCredencialDisc[] = $faker->unique()->numberBetween($min = 1, $max = 150);
        // }
        //
        // for ($i=0; $i < 120; $i++) {
        //     $enTramite = $faker->boolean;
        //
        //     if($enTramite == true) {
        //         $fechaVencimiento = null;
        //     } else {
        //         $fechaVencimiento = $faker->dateTimeBetween($startDate = 'now', $endDate = '+5 years', $timezone = date_default_timezone_get());
        //     }
        //     $credencialDiscapacidad = new \App\CredencialDiscapacidad([
        //         'fecha_vencimiento' => $fechaVencimiento,
        //         'en_tramite' => $enTramite,
        //         'beneficiario_id' => $IdsCredencialDisc[$i]
        //     ]);
        //     $credencialDiscapacidad->save();
        //
        // }
        // $faker->unique($reset=true);
    }
}
