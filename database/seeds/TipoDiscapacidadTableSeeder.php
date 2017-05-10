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
            'nombre' => 'física'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'cognitiva'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'psiquica'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'sensorial visual'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'sensorial auditiva'
        ]);
        $tipoDiscapacidad->save();

        $tipoDiscapacidad = new \App\TipoDiscapacidad([
            'nombre' => 'social y de la comunicación'
        ]);
        $tipoDiscapacidad->save();
    }
}
