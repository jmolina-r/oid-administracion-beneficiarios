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
            'nombre' => 'verificación de domicilio',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'credencial de discapacidad',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'subsidios',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'beneficios sociales',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'tribunales de familia',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'activación de red',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'becas',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'elaboración de informe social',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'entrega de ayuda social',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();
        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 't senadis',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

    }
}
