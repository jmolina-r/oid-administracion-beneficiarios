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
            'nombre' => 'Soltero'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'Casado'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'Conviviente'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'Separado'
        ]);
        $estadoCivil->save();

        $estadoCivil = new \App\EstadoCivil([
            'nombre' => 'Viudo'
        ]);
        $estadoCivil->save();
    }
}
