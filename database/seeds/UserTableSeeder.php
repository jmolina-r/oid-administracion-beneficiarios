<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            // 'name' => 'juan',
            'username' => 'admin',
            'email' => 'admin@admin.com'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'juan',
            'username' => '17514574-5',
            'email' => 'juan@juan.com'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'pedro',
            'username' => 'pedro',
            'email' => 'pedro@pedro.com',
            'status' => 0
        ]);

        factory(App\User::class)->create([
            // 'name' => 'diego',
            'username' => 'diego',
            'email' => 'diego@diego.com'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'secretaria',
            'username' => 'secretaria',
            'email' => 'secretaria@oid.cl',
            'funcionario_id' => 10

        ]);

        factory(App\User::class)->create([
            // 'name' => 'coordinador_oficina',
            'username' => 'coordinador_oficina',
            'email' => 'coordinador_oficina@oid.cl'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'jefatura',
            'username' => 'jefatura',
            'email' => 'jefatura@oid.cl'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'psicologia',
            'username' => 'psicologia',
            'email' => 'psicologia@oid.cl',
            'funcionario_id' => 1
        ]);

        factory(App\User::class)->create([
            // 'name' => 'kinesiologia',
            'username' => 'kinesiologia',
            'email' => 'kinesiologia@oid.cl',
            'funcionario_id' => 2
        ]);

        factory(App\User::class)->create([
            // 'name' => 'trabajo_social',
            'username' => 'trabajo_social',
            'email' => 'trabajo_social@oid.cl'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'terapia_ocupacional',
            'username' => 'terapia_ocupacional',
            'email' => 'terapia_ocupacional@oid.cl',
            'funcionario_id' => 4
        ]);

        factory(App\User::class)->create([
            // 'name' => 'fonoaudiologia',
            'username' => 'fonoaudiologia',
            'email' => 'fonoaudiologia@oid.cl',
            'funcionario_id' => 5
        ]);
    }
}
