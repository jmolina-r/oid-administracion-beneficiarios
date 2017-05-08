<?php

use Illuminate\Database\Seeder;

class BeneficiarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Beneficiario::class, 150)->create();
    }
}
