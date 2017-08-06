<?php

use Illuminate\Database\Seeder;

class AntecedentesFamiliaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AntecedentesFamiliares::class, 5)->create();
    }
}
