<?php

use Illuminate\Database\Seeder;

class PrestacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Prestacion::class,3)->create();
    }
}
