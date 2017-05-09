<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(EducacionTableSeeder::class);
        $this->call(OcupacionTableSeeder::class);
        $this->call(BeneficiarioTableSeeder::class);
        $this->call(TelefonoTableSeeder::class);
        $this->call(TutorTableSeeder::class);
        $this->call(RegistroSocialHogarTableSeeder::class);
    }
}
