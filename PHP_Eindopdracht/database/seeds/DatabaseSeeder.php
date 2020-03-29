<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(tagsSeeder::class);
        $this->call(CourseTestMethodSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TeacherTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(DeadlineTableSeeder::class);
    }

}
