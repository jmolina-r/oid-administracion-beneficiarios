<?php

use Illuminate\Database\Seeder;

class OcupacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ocupacion = new \App\Ocupacion([
            'nombre' => 'Trabajador'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'Estudiante'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'Dueño de casa'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'Pensionado'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'Cesante'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'Otros'
        ]);
        $ocupacion->save();


    }
}
