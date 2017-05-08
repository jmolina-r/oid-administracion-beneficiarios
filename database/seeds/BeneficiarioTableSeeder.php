<?php

use Illuminate\Database\Seeder;

class BeneficiarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beneficiario = new \App\Beneficiario([
            'nombre' => 'juan',
            'apellido' => 'juanes',
            'rut' => '666-6',
            'sexo' => 'masculino'
        ]);
        $beneficiario->save();

    }
}
