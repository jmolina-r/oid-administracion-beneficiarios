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
            'nombre' => 'psicologo'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'kinesiologo'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'secretaria'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'terapeuta ocupacional'
        ]);
        $tipoFuncionario->save();

        $tipoFuncionario = new \App\TipoFuncionario([
            'nombre' => 'otro'
        ]);
        $tipoFuncionario->save();
    }
}
