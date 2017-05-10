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
            'nombre' => 'permanente'
        ]);
        $tipoDependencia->save();

        $tipoDependencia = new \App\TipoDependencia([
            'nombre' => 'intermitente'
        ]);
        $tipoDependencia->save();

        $tipoDependencia = new \App\TipoDependencia([
            'nombre' => 'ocacional'
        ]);
        $tipoDependencia->save();
    }
}
