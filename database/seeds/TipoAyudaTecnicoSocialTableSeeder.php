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

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'silla estandar'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'silla neurológica'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'silla activa'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'bastones'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'muletas'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'carro andador'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'cojin ae'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'colchon ar'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'baño portatil'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'silla de ducha'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'banqueta de tina'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'sitting'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'elementos para alimentación'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'elementos para vestuario'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'audifonos'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'equipos computacionales'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'tecnico',
            'nombre' => 'otros'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'social',
            'nombre' => 'pañales'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'social',
            'nombre' => 'medicamentos'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'social',
            'nombre' => 'leche'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'social',
            'nombre' => 'canasta de alimentos'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'social',
            'nombre' => 'coaportes'
        ]);
        $tipoAyudaTecnicoSocial->save();

        $tipoAyudaTecnicoSocial = new \App\TipoAyudaTecnicoSocial([
            'tipo'=> 'social',
            'nombre' => 'otras'
        ]);
        $tipoAyudaTecnicoSocial->save();
    }
}
