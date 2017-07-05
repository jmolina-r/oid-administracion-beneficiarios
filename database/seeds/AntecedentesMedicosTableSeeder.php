<?php

use Illuminate\Database\Seeder;

class AntecedentesMedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AntecedentesMedicos::class, 5)->create();
    }
}
