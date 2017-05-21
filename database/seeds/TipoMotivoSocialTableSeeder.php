<?php

use Illuminate\Database\Seeder;

class TipoMotivoSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipoMotivoSocial = new \App\TipoMotivoSocial([
            'nombre' => 'orientación'
        ]);
        $tipoMotivoSocial->save();

        $tipoMotivoSocial = new \App\TipoMotivoSocial([
            'nombre' => 'visita domiciliaria'
        ]);
        $tipoMotivoSocial->save();

        $tipoMotivoSocial = new \App\TipoMotivoSocial([
            'nombre' => 'becas'
        ]);
        $tipoMotivoSocial->save();
    }
}
