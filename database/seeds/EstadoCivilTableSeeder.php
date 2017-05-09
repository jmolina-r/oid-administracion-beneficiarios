<?php

use Illuminate\Database\Seeder;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'soltero'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'casado'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'conviviente'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'separado'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'viudo'
        ]);
        $estadoCivil->save();
    }
}
