<?php

use App\Tag;
use Illuminate\Database\Seeder;

class tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag_easy = new Tag();
        $tag_easy->title = 'Makkelijk';
        $tag_easy->save();

        $tag_hard = new Tag();
        $tag_hard->title = 'Moeilijk';
        $tag_hard->save();

        $tag_Mwork = new Tag();
        $tag_Mwork->title = 'Veel werk';
        $tag_Mwork->save();

        $tag_Lwork = new Tag();
        $tag_Lwork->title = 'Weinig werk';
        $tag_Lwork->save();

        $tag_fun = new Tag();
        $tag_fun->title = 'Leuk';
        $tag_fun->save();

        $tag_Nfun = new Tag();
        $tag_Nfun->title = 'Niet leuk';
        $tag_Nfun->save();
    }
}
