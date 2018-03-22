<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assigned_roles')->truncate();

        User::truncate();
        $user = User::create([
            'name' => 'jonatan',
            'email' => 'jonatan.eseiza@gmail.com',
            'password' => '123456',
        ]);

        Role::truncate();
        $role = Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador del sitio web',
        ]);

        $user->roles()->attach($role->id);
    }
}
