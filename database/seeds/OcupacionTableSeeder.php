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
            'nombre' => 'trabajador'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'estudiante'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'dueño de casa'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'pensionado'
        ]);
        $ocupacion->save();

        $ocupacion = new \App\Ocupacion([
            'nombre' => 'cesante'
        ]);
        $ocupacion->save();

        
    }
}
