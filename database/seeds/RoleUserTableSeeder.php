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
        $role1 = \App\Role::find(1);
        $role2 = \App\Role::find(2);

        $user = \App\User::find(1);
        $user->roles()->save($role1);

        $user = \App\User::find(2);
        $user->roles()->save($role2);

        $user = \App\User::find(3);
        $user->roles()->save($role1);
        $user->roles()->save($role2);

        $user = \App\User::where('name', 'secretaria')->first();
        $user->roles()->save(\App\Role::where('nombre', 'secretaria')->first());

        $user = \App\User::where('name', 'coordinador_oficina')->first();
        $user->roles()->save(\App\Role::where('nombre', 'coordinador_oficina')->first());

        $user = \App\User::where('name', 'jefatura')->first();
        $user->roles()->save(\App\Role::where('nombre', 'jefatura')->first());

        $user = \App\User::where('name', 'psicologia')->first();
        $user->roles()->save(\App\Role::where('nombre', 'psicologia')->first());

        $user = \App\User::where('name', 'kinesiologia')->first();
        $user->roles()->save(\App\Role::where('nombre', 'kinesiologia')->first());

        $user = \App\User::where('name', 'trabajo_social')->first();
        $user->roles()->save(\App\Role::where('nombre', 'trabajo_social')->first());

        $user = \App\User::where('name', 'terapia_ocupacional')->first();
        $user->roles()->save(\App\Role::where('nombre', 'terapia_ocupacional')->first());

        $user = \App\User::where('name', 'fonoaudiologia')->first();
        $user->roles()->save(\App\Role::where('nombre', 'fonoaudiologia')->first());
    }
}
