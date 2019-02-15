<?php

use Illuminate\Database\Seeder;
use App\Demanda;

class DemandaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Demanda::create([
            'nombre' => 'KINESIOLOGIA',
        ]);
        Demanda::create([
            'nombre' => 'TERAPIA OCUPACIONAL',
        ]);

        Demanda::create([
            'nombre' => 'PSICOLOGIA 1',
        ]);

        Demanda::create([
            'nombre' => 'PSICOLOGIA 2',
        ]);

        Demanda::create([
            'nombre' => 'EDUCADOR DIFERENCIAL',
        ]);

        Demanda::create([
            'nombre' => 'ATENCION SOCIAL',
        ]);
    }
}
