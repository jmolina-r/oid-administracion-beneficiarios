<?php

use Illuminate\Database\Seeder;

class fakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creación de beneficiarios
        //for ($i = 0; $i < 4; $i++) {
        //    $beneficiario = factory(App\Beneficiario::class)->create();
        //}

        //creación de funcionarios
        //for ($i = 0; $i < 4; $i++) {
        //    $funcionario = factory(App\Funcionario::class)->create();
        //}

        //creación de usuarios
        for ($i = 0; $i < 4; $i++) {
            $user = factory(App\User::class)->create();
            $funcionario = factory(App\Funcionario::class)->create();
            $user->funcionario_id=$i+2;
        }
    }
}
