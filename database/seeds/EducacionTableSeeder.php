<?php

use Illuminate\Database\Seeder;

class EducacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $educacion = new \App\Educacion([
            'nombre' => 'Pre básico'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Básico incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Básico completo'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Medio incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Medio completo'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Técnico incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Técnico completo'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Universitario incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'Universitario completo'
        ]);
        $educacion->save();
    }
}
