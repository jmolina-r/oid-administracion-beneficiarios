<?php

use Illuminate\Database\Seeder;

class FichaPsicologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FichaPsicologia::class, 5)->create();
    }
}
