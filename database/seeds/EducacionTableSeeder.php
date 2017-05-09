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
            'nombre' => 'pre básico'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'básico incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'básico completo'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'medio incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'medio completo'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'técnico incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'técnico completo'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'universitario incompleto'
        ]);
        $educacion->save();

        $educacion = new \App\Educacion([
            'nombre' => 'universitario completo'
        ]);
        $educacion->save();
    }
}
