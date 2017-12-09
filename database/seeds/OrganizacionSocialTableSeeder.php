<?php

use Illuminate\Database\Seeder;

class OrganizacionSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        $organizacionSocial = new \App\OrganizacionSocial([
            'nombre' => 'Junta nacional de discapacidad',
            'descripcion' => $faker->text
        ]);
        $organizacionSocial->save();
    }
}
