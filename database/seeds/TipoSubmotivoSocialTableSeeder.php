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
            'nombre' => 'verificación de domicilio'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'credencial de discapacidad'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'subsidios'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'beneficios sociales'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'tribunales de familia'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'activación de red'
        ]);
        $tipoSubmotivoSocial->save();

        $tipoSubmotivoSocial = new \App\TipoSubmotivoSocial([
            'nombre' => 'becas'
        ]);
        $tipoSubmotivoSocial->save();
    }
}
