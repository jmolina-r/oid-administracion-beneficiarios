<?php

use Illuminate\Database\Seeder;

class DescripcionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Descripcion::create([
            'nombre' => 'Buzón de voz',
        ]);

        \App\Descripcion::create([
            'nombre' => 'Número equivocado',
        ]);

        \App\Descripcion::create([
            'nombre' => 'Rechaza atención',
        ]);
        \App\Descripcion::create([
            'nombre' => 'Otro',
        ]);
    }
}
