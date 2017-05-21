<?php

use Illuminate\Database\Seeder;

class TipoSubmotivoSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'credencial discapacidad'
        ]);
        $tipoSubmotivoSocial->save();
    }
}
