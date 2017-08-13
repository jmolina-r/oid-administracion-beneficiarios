<?php

use Illuminate\Database\Seeder;

class TerapeutaOcupacionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TerapeutaOcupacional::class, 5)->create();
    }
}
