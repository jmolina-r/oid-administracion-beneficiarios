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
            'nombre' => 'cuprum ',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'habitad',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'plan vital',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'próvida',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'santa maria',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'modelo',
        ]);
        $prevision->save();


        $prevision = new \App\Prevision([
            'nombre' => 'capital',
        ]);
        $prevision->save();

        $prevision = new \App\Prevision([
            'nombre' => 'IPS',
        ]);
        $prevision->save();

        $prevision = new \App\Prevision([
            'nombre' => 'otros',
        ]);
        $prevision->save();

    }
}
