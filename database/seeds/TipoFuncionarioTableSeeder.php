<?php

use Illuminate\Database\Seeder;

class TipoFuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Kinesiologo'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Psicologo'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Fonoaudiologo'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Terapeuta ocupacional'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Trabajador social'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Secretaria'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'Otro'
        ]);
        $tipoFuncionario->save();
    }
}
