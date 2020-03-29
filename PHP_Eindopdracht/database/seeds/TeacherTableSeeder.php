<?php

use App\Teacher;
use Illuminate\Database\Seeder;

class TeacherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher1 = new Teacher();
        $teacher1->name = "Jasper van Rosmalen";
        $teacher1->email = "j.vanrosmalen@avans.nl";
        $teacher1->has_taught = 1;
        $teacher1->save();

        $teacher2 = new Teacher();
        $teacher2->name = "Rik Meijer";
        $teacher2->email = "ha.meijer@avans.nl";
        $teacher2->has_taught = 0;
        $teacher2->save();
    }
}
