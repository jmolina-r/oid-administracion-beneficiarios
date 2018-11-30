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
            'nombre' => 'Subsidio discapacidad mental'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Pensión básica solidaria de invalidez'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Subsidio agua potable'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Pensión básica solidaria de vejez'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Subsidio maternal'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Subsidio familiar'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Bono protección social'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Asignacion social'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Becas'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Jubilacion afp'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Asignacion familiar'
        ]);
        $beneficio->save();

        $beneficio = new \App\Beneficio([
            'nombre' => 'Aporte previsional solidario'
        ]);
        $beneficio->save();

    }
}

