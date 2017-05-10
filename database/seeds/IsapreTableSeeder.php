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
            'organizacion' => 'cruz blanca'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'colmena'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'más vida'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'consalud'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'banmedica'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'vida tres'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'codelco'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'dipreca'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'capredena'
        ]);
        $isapre->save();
        $isapre = new \App\Isapre([
            'organizacion' => 'ferrosalud'
        ]);
        $isapre->save();
    }
}
