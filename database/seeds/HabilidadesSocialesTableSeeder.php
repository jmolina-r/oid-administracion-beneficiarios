<?php

use Illuminate\Database\Seeder;

class HabilidadesSocialesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\HabilidadesSociales::class, 5)->create();
    }
}
