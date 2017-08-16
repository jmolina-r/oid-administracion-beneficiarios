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
            'email' => 'admin@admin.com',
            'role_id' => '1'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'juan',
            'username' => '17514574-5',
            'email' => 'juan@juan.com',
            'role_id' => '6'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'pedro',
            'username' => '18508182-6',
            'email' => 'pedro@pedro.com',
            'status' => 0,
            'role_id' => '4'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'diego',
            'username' => '19034687-0',
            'email' => 'diego@diego.com',
            'role_id' => '5'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'secretaria',
            'username' => '18312277-0',
            'email' => 'secretaria@oid.cl',
            'funcionario_id' => 3,
            'role_id' => '2'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'coordinador_oficina',
            'username' => 'coordinador_oficina',
            'email' => 'coordinador_oficina@oid.cl',
            'role_id' => '2'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'jefatura',
            'username' => 'jefatura',
            'email' => 'jefatura@oid.cl',
            'role_id' => '4'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'psicologia',
            'username' => 'psicologia',
            'email' => 'psicologia@oid.cl',
            'funcionario_id' => 1,
            'role_id' => '5'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'kinesiologia',
            'username' => 'kinesiologia',
            'email' => 'kinesiologia@oid.cl',
            'funcionario_id' => 2,
            'role_id' => '6'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'trabajo_social',
            'username' => 'trabajo_social',
            'email' => 'trabajo_social@oid.cl',
            'role_id' => '7'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'terapia_ocupacional',
            'username' => 'terapia_ocupacional',
            'email' => 'terapia_ocupacional@oid.cl',
            'funcionario_id' => 4,
            'role_id' => '8'
        ]);

        factory(App\User::class)->create([
            // 'name' => 'fonoaudiologia',
            'username' => 'fonoaudiologia',
            'email' => 'fonoaudiologia@oid.cl',
            'funcionario_id' => 5,
            'role_id' => '9'
        ]);
    }
}
