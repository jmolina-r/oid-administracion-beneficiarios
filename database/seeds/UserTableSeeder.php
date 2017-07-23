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
    }
}
