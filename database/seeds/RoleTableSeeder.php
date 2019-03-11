<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = new \App\Role([
            'nombre' => 'kinesiologia'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'psicologia'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'fonoaudiologia'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'terapia_ocupacional'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'trabajo_social'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'secretaria'
        ]);
        $role->save();

        //$role = new \App\Role([
        //    'nombre' => 'coordinador_oficina'
        //]);
        //$role->save();

        //$role = new \App\Role([
        //    'nombre' => 'jefatura'
        //]);
        //$role->save();
        $role = new \App\Role([
            'nombre' => 'tallerista'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'educador'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'admin'
        ]);
        $role->save();
    }
}
