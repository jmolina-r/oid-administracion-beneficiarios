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
            'nombre' => 'admin'
        ]);
        $role->save();

        $role = new \App\Role([
            'nombre' => 'secretaria'
        ]);
        $role->save();
    }
}
