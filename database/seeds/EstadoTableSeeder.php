<?php

use Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Estado::create([
            'nombre' => 'AGENDADA',
        ]);

        \App\Estado::create([
            'nombre' => 'PENDIENTE',
        ]);

        \App\Estado::create([
            'nombre' => 'DESCARTADO',
        ]);
    }
}
