<?php

use Illuminate\Database\Seeder;

class ValEvaluacionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ValEvaluacion::class, 2)->create();
    }
}
