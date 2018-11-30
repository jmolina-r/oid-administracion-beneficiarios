<?php

use Illuminate\Database\Seeder;

class PrestacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial fonoaudiologia',
            'area' => 'Fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial kinesiologia',
            'area' => 'Kinesiologo',
        ]);
        $prestacion->save();
        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial terapia ocupacional',
            'area' => 'Terapeuta ocupacional',
        ]);
        $prestacion->save();
        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial psicologia',
            'area' => 'Psicologo',
        ]);
        $prestacion->save();

    }
}

