<?php

use Illuminate\Database\Seeder;

class ValAutocuidadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ValAutocuidado::class, 2)->create();
    }
}
