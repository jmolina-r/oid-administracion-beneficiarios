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
            'nombre' => 'PSICOLOGIA CLINICA',
        ]);

        Demanda::create([
            'nombre' => 'PSICOLOGIA LABORAL',
        ]);

        Demanda::create([
            'nombre' => 'FONOAUDIOLOGIA',
        ]);

        Demanda::create([
            'nombre' => 'ATENCION SOCIAL',
        ]);

        Demanda::create([
            'nombre' => 'EDUCADOR',
        ]);
        Demanda::create([
            'nombre' => 'TALLERES',
        ]);
    }
}
