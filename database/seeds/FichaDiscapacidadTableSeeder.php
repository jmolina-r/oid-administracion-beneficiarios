<?php

use Illuminate\Database\Seeder;

class FichaDiscapacidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i=1; $i <= 150; $i++) {
            $fichaDiscapacidad = new \App\FichaDiscapacidad([
                'requiere_cuidado' => $faker->boolean,
                'diagnostico' => $faker->optional()->text,
                'otras_enfermedades' => $faker->optional()->text,
                'ficha_beneficiario_id' => $i
            ]);
            $fichaDiscapacidad->save();
        }
    }
}
