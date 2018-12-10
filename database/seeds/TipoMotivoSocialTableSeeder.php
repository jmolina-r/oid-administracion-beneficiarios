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
            'nombre' => 'Ayudas'
        ]);
        $tipoMotivoSocial->save();
        $tipoMotivoSocial = new \App\TipoMotivoSocial([
            'nombre' => 'Orientación'
        ]);
        $tipoMotivoSocial->save();

        $tipoMotivoSocial = new \App\TipoMotivoSocial([
            'nombre' => 'Visita domiciliaria'
        ]);
        $tipoMotivoSocial->save();

        $tipoMotivoSocial = new \App\TipoMotivoSocial([
            'nombre' => 'Becas'
        ]);
        $tipoMotivoSocial->save();
    }
}
