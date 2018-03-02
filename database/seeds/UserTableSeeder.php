<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();

        $user = User::create([
            'name' => 'Jonatan',
            'email' => 'jonatan@email.com',
            'password' => '123456',
        ]);

        $role = \App\Role::create([
            'name' => 'admin',
            'display_name' =>'Administrador',
            'description' => 'Administrador del sitio web',
        ]);

        $user->roles()->save($role);
    }

}
