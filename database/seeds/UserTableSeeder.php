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
        // factory(App\User::class)->create([
        //     // 'name' => 'juan',
        //     'username' => '11819322-9',
        //     'email' => 'paola@oid.cl',
        //     'role_id' => '1',
        //     'funcionario_id' => '1',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'juan',
        //     'username' => '17514574-5',
        //     'email' => 'durrutia@oid.cl',
        //     'role_id' => '2',
        //     'funcionario_id' => '2',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'pedro',
        //     'username' => '18508182-6',
        //     'email' => 'lufe__Xx@oid.cl',
        //     'status' => 0,
        //     'role_id' => '3',
        //     'funcionario_id' => '3',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'diego',
        //     'username' => '19034687-0',
        //     'email' => 'johnCitooX_EmmoxXxito._-x@oid.cl',
        //     'role_id' => '4',
        //     'funcionario_id' => '4',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'secretaria',
        //     'username' => '18312277-0',
        //     'email' => 'priscila@oid.cl',
        //     'role_id' => '5',
        //     'funcionario_id' => '5',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'coordinador_oficina',
        //     'username' => '17725104-6',
        //     'email' => 'alfredo@oid.cl',
        //     'role_id' => '6',
        //     'funcionario_id' => '6',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'jefatura',
        //     'username' => '13014491-8',
        //     'email' => 'durrutia@nuc.cl',
        //     'role_id' => '7',
        //     'funcionario_id' => '7',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'psicologia',
        //     'username' => '18218164-1',
        //     'email' => 'cat@oid.cl',
        //     'role_id' => '8',
        //     'funcionario_id' => '8',
        // ]);
        //
        // factory(App\User::class)->create([
        //     // 'name' => 'kinesiologia',
        //     'username' => '10180773-8',
        //     'email' => 'lira@oid.cl',
        //     'role_id' => '9',
        //     'funcionario_id' => '9',
        // ]);

        factory(App\User::class)->create([
            // 'name' => 'terapia_ocupacional',
            'username' => 'admin',
            'email' => 'oid@oid.cl',
            'role_id' => '9',
            'funcionario_id' => '1',
        ]);

    }
}
