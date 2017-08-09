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
        $beneficio = new \App\Beneficio([
            'nombre' => 'subsidio discapacidad mental'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'pensión básica solidaria de invalidez'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'subsidio agua potable'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'pensión básica solidaria de vejez'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'subsidio maternal'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'subsidio familiar'
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
