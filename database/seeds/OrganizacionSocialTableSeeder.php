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
            'nombre' => 'La de mi casa',
            'descripcion' => $faker->text
        ]);
        $organizacionSocial->save();
        $organizacionSocial = new \App\OrganizacionSocial([
            'nombre' => 'La de mi abuelita',
            'descripcion' => $faker->text
        ]);
        $organizacionSocial->save();
        $organizacionSocial = new \App\OrganizacionSocial([
            'nombre' => 'La de mi padre',
            'descripcion' => $faker->text
        ]);
        $organizacionSocial->save();
    }
}
