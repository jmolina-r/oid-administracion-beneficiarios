<?php

use Illuminate\Database\Seeder;

class KinesiologoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Kinesiologo::class, 3)->create();
    }
}