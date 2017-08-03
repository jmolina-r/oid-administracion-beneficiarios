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
            'name' => 'juan',
            'email' => 'juan@juan.com'
        ]);

        factory(App\User::class)->create([
            'name' => 'pedro',
            'email' => 'pedro@pedro.com'
        ]);

        factory(App\User::class)->create([
            'name' => 'diego',
            'email' => 'diego@diego.com'
        ]);

        factory(App\User::class)->create([
            'name' => 'secretaria',
            'email' => 'secretaria@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'coordinador_oficina',
            'email' => 'coordinador_oficina@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'jefatura',
            'email' => 'jefatura@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'psicologia',
            'email' => 'psicologia@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'kinesiologia',
            'email' => 'kinesiologia@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'trabajo_social',
            'email' => 'trabajo_social@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'terapia_ocupacional',
            'email' => 'terapia_ocupacional@oid.cl'
        ]);

        factory(App\User::class)->create([
            'name' => 'fonoaudiologia',
            'email' => 'fonoaudiologia@oid.cl'
        ]);
    }
}
