<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_dmanager  = Role::where('name', 'Deadline manager')->first();

        $admin = new User();
        $admin->name = 'Bas';
        $admin->email = 'bas@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $student = new User();
        $student->name = 'Jeroen';
        $student->email = 'jeroen@example.com';
        $student->password = bcrypt('password');
        $student->save();
        $student->roles()->attach($role_dmanager);

    }
}
