<?php

use Illuminate\Database\Seeder;

class PrevisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prevision = new \App\Prevision([
            //'nombre' => 'bansander',
            'nombre' => 'Bansander',
        ]);
        $prevision->save();

        $prevision = new \App\Prevision([
            //'nombre' => 'cuprum ',
            'nombre' => 'Cuprum ',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'Habitad',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'Plan vital',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'Próvida',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'Santa maria',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'Modelo',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'Capital',
        ]);
        $prevision->save();

        $prevision = new \App\Prevision([
            'nombre' => 'IPS',
        ]);
        $prevision->save();

        $prevision = new \App\Prevision([
            'nombre' => 'Otros',
        ]);
        $prevision->save();

    }
}
