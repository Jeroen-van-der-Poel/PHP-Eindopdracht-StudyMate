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
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'Jeroen';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($role_dmanager);

    }
}
