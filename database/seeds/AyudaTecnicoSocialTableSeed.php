<?php

use Illuminate\Database\Seeder;

class AyudaTecnicoSocialTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AyudaTecnicoSocial::class,20)->create();

    }
}
