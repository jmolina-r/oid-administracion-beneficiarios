<?php

use Illuminate\Database\Seeder;

class PsicologoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Psicologo::class, 5)->create();
    }
}
