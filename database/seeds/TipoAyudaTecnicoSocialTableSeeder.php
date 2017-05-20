<?php

use Illuminate\Database\Seeder;

class TipoAyudaTecnicoSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'silla electrica'
        ]);
        $tipoAyudaTecnicoSocial->save();

    }
}
