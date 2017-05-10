<?php

use Illuminate\Database\Seeder;

class FichaAtencionSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\FichaAtencionSocial::class,100)->create();

    }
}
