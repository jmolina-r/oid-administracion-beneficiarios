<?php

use Illuminate\Database\Seeder;

class FonasaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fonasa = new \App\Fonasa([
            'tramo' => 'A'
        ]);
        $fonasa->save();
        $fonasa = new \App\Fonasa([
            'tramo' => 'B'
        ]);
        $fonasa->save();
        $fonasa = new \App\Fonasa([
            'tramo' => 'C'
        ]);
        $fonasa->save();
        $fonasa = new \App\Fonasa([
            'tramo' => 'D'
        ]);
        $fonasa->save();
    }
}
