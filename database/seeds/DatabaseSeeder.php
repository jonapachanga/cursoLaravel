<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(MessagesTableSeeder::class);
         $this->call(UserTableSeeder::class);
//        User::truncate();
//        $users = config('migration.users');
//        foreach ($users as $user) {
//            $user['password'] = bcrypt($user['password']);
//            User::create($user);
//        }
//        echo "------USERS OK\n";
//
//        Role::truncate();
//        $roles = config('migration.roles');
//        foreach ($roles as $role) {
//            Role::create($role);
//        }
//        echo "------ROLES OK\n";
    }
}
