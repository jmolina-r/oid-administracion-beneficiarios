<?php

use Illuminate\Database\Seeder;

class FuncionarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Funcionario::class)->create([
            'rut' => '11819322-9',
            'email' => 'paola@oid.cl',
            'tipo_funcionario_id' => '1',
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '17514574-5',
            'email' => 'juan@juan.com',
            'tipo_funcionario_id' => '2',
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '18508182-6',
            'email' => 'pedro@pedro.com',
            'tipo_funcionario_id' => '3'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '19034687-0',
            'email' => 'diego@diego.com',
            'tipo_funcionario_id' => '4'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '18312277-0',
            'email' => 'secretaria@oid.cl',
            'tipo_funcionario_id' => '5',
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '17725104-6',
            'email' => 'alfredo@oid.cl',
            'tipo_funcionario_id' => '6'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '13014491-8',
            'email' => 'durrutia@ucn.cl',
            'tipo_funcionario_id' => '7'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '18218164-1',
            'email' => 'cat@oid.cl',
            'tipo_funcionario_id' => '6'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '10180773-8',
            'email' => 'lira@oid.cl',
            'tipo_funcionario_id' => '7'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => 'admin',
            'email' => 'oid@oid.cl',
            'tipo_funcionario_id' => '1'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '16364173-9',
            'email' => 'juano@oid.cl',
            'tipo_funcionario_id' => '7'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '18103888-8',
            'email' => 'joana@oid.cl',
            'tipo_funcionario_id' => '7'
        ]);

        factory(App\Funcionario::class)->create([
            'rut' => '17290567-6',
            'email' => 'caro@oid.cl',
            'tipo_funcionario_id' => '7'
        ]);
    }
}
