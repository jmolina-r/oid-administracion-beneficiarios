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


        $this->call(PrestacionRealizadaTableSeeder::class);
        $this->call(FichaAtencionSocialTableSeeder::class);
        $this->call(MotivoAtencionSocialTableSeeder::class);
        $this->call(AyudaTecnicoSocialTableSeed::class);
        $this->call(SubMotivoAtencionSocialTableSeed::class);

    }
}
