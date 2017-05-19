<?php

use Illuminate\Database\Seeder;

class TelefonoBeneficiarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TelefonoBeneficiario::class, 200)->create();
    }
}
