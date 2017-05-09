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

        $this->call(KinesiologoTableSeeder::class);
        $this->call(AntecedentesMorbidosTableSeeder::class);
        $this->call(ValAutocuidadoTableSeeder::class);
        $this->call(ValComCogTableSeeder::class);
        $this->call(ValControlEsfinterTableSeeder::class);
        $this->call(ValDeambulacionTableSeeder::class);
        $this->call(ValEvaluacionTableSeeder::class);
        $this->call(ValMotoraTableSeeder::class);
        $this->call(ValMovilidadTableSeeder::class);
        $this->call(ValSensorialTableSeeder::class);
        $this->call(ValSocialTableSeeder::class);
        $this->call(IngresoKinesiologiaTableSeeder::class);

    }
}
