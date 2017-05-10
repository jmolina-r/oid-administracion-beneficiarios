<?php

use Illuminate\Database\Seeder;

class CredencialDiscapacidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CredencialDiscapacidad::class, 120)->create();
    }
}
