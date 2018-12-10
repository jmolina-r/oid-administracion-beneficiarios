<?php

use Illuminate\Database\Seeder;

class IsapreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $isapre = new \App\Isapre([
            'organizacion' => 'Cruz blanca'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Colmena'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Más vida'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Consalud'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Banmedica'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Vida tres'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Codelco'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Dipreca'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Capredena'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'Ferrosalud'
        ]);
        $isapre->save();
    }
}
