<?php

use Illuminate\Database\Seeder;

class TutorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tutor::class, 150)->create();
    }
}