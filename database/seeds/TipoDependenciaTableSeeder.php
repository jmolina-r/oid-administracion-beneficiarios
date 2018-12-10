<?php

use Illuminate\Database\Seeder;

class TipoDependenciaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDependencia = new \App\TipoDependencia([
            'nombre' => 'Permanente'
        ]);
        $tipoDependencia->save();

        $tipoDependencia = new \App\TipoDependencia([
            'nombre' => 'Intermitente'
        ]);
        $tipoDependencia->save();

        $tipoDependencia = new \App\TipoDependencia([
            'nombre' => 'Ocacional'
        ]);
        $tipoDependencia->save();

        $tipoDependencia = new \App\TipoDependencia([
            'nombre' => 'Independiente'
        ]);
        $tipoDependencia->save();
    }
}
