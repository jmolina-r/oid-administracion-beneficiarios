<?php

use Illuminate\Database\Seeder;

class TelefonoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Telefono::class, 200)->create();
    }
}
