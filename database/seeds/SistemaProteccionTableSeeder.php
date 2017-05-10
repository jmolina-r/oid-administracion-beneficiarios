<?php

use Illuminate\Database\Seeder;

class SistemaProteccionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'chisol/sof'
        ]);
        $sistemaProteccion->save();
        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'vinculos'
        ]);
        $sistemaProteccion->save();
        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'calle'
        ]);
        $sistemaProteccion->save();
        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'chile crece contigo'
        ]);
        $sistemaProteccion->save();
    }
}
