<?php

use App\Role;
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
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'The administrator of Studymate';
        $role_admin->save();

        $role_contentManager = new Role();
        $role_contentManager->name = 'Deadline manager';
        $role_contentManager->description = 'The deadline manager of Studymate';
        $role_contentManager->save();

    }
}
