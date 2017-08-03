<?php

use Illuminate\Database\Seeder;

class BeneficioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // sin abreviaciones.
        $beneficio = new \App\Beneficio([
            'nombre' => 'sub. discapacidad mental'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'pbs invalidez'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'sub. agua potable'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'pbs vejez'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'sub. maternal'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'sub. familiar'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'bono protección social'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'asignacion social'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'becas'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'jubilacion afp'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'asignacion familiar'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'aporte previsional solidario'
        ]);
        $beneficio->save();

    }
}
