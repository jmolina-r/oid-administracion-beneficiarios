<?php

use Illuminate\Database\Seeder;

class ValSensorialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ValSensorial::class, 2)->create();
    }
}
