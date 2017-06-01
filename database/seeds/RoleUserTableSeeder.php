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
    }
}
