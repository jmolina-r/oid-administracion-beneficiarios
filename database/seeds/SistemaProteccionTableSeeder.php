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
        // Cambiar a mayusculas.
        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'No tiene'
        ]);
        $sistemaProteccion->save();

        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'Chisol/sof'
        ]);
        $sistemaProteccion->save();

        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'Vinculos'
        ]);
        $sistemaProteccion->save();

        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'Calle'
        ]);
        $sistemaProteccion->save();

        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'Chile crece contigo'
        ]);
        $sistemaProteccion->save();

        $sistemaProteccion = new \App\SistemaProteccion([
            'nombre' => 'Otros'
        ]);
        $sistemaProteccion->save();
    }
}
