<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::where('username', 'admin')->first();
        $user->roles()->save(\App\Role::where('nombre', 'admin')->first());

        $user = \App\User::where('username', 'juan')->first();
        $user->roles()->save(\App\Role::where('nombre', 'secretaria')->first());
        $user->roles()->save(\App\Role::where('nombre', 'psicologia')->first());
        $user->roles()->save(\App\Role::where('nombre', 'jefatura')->first());
        $user->roles()->save(\App\Role::where('nombre', 'jefatura')->first());


        $user = \App\User::where('username', 'pedro')->first();
        $user->roles()->save(\App\Role::where('nombre', 'coordinador_oficina')->first());
        $user->roles()->save(\App\Role::where('nombre', 'jefatura')->first());

        $user = \App\User::where('username', 'diego')->first();
        $user->roles()->save(\App\Role::where('nombre', 'admin')->first());

        $user = \App\User::where('username', 'secretaria')->first();
        $user->roles()->save(\App\Role::where('nombre', 'secretaria')->first());

        $user = \App\User::where('username', 'coordinador_oficina')->first();
        $user->roles()->save(\App\Role::where('nombre', 'coordinador_oficina')->first());

        $user = \App\User::where('username', 'jefatura')->first();
        $user->roles()->save(\App\Role::where('nombre', 'jefatura')->first());

        $user = \App\User::where('username', 'psicologia')->first();
        $user->roles()->save(\App\Role::where('nombre', 'psicologia')->first());

        $user = \App\User::where('username', 'kinesiologia')->first();
        $user->roles()->save(\App\Role::where('nombre', 'kinesiologia')->first());

        $user = \App\User::where('username', 'trabajo_social')->first();
        $user->roles()->save(\App\Role::where('nombre', 'trabajo_social')->first());

        $user = \App\User::where('username', 'terapia_ocupacional')->first();
        $user->roles()->save(\App\Role::where('nombre', 'terapia_ocupacional')->first());

        $user = \App\User::where('username', 'fonoaudiologia')->first();
        $user->roles()->save(\App\Role::where('nombre', 'fonoaudiologia')->first());
    }
}
