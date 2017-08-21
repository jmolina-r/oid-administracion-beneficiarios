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
            'area' => 'fonoaudiologo',
        ]);
        $prestacion->save();

        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial kinesiologia',
            'area' => 'kinesiologo',
        ]);
        $prestacion->save();
        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial terapia ocupacional',
            'area' => 'terapeuta ocupacional',
        ]);
        $prestacion->save();
        $prestacion = new \App\Prestacion([
            'nombre' => 'Inicial psicologia',
            'area' => 'psicologo',
        ]);
        $prestacion->save();

    }
}

