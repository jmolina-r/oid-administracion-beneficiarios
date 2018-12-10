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
            'nombre' => 'Credencial de discapacidad',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Subsidios',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Beneficios sociales',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Tribunales de familia',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Activación de red',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Becas',
            'tipo_motivo_social_id' => '2'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Verificación de domicilio',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Elaboración de informe social',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Entrega de ayuda social',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Ayuda técnica senadis',
            'tipo_motivo_social_id' => '3'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Beca municipal',
            'tipo_motivo_social_id' => '4'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'Postulación ayuda técnica senadis',
            'tipo_motivo_social_id' => '4'
        ]);
        $tipoSubmotivoSocial->save();

    }
}
