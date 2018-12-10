<?php

use Illuminate\Database\Seeder;

class TipoDiscapacidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'Física'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'Cognitiva'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'Psíquica'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'Sensorial visual'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'Sensorial auditiva'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'Social y de la comunicación'
        ]);
        $tipoDiscapacidad->save();
    }
}
