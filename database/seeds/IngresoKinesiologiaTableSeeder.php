<?php

use Illuminate\Database\Seeder;

class IngresoKinesiologiaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\IngresoKinesiologia::class, 5)->create();
    }
}
