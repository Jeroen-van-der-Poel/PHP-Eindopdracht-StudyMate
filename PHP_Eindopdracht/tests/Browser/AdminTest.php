<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function test_create_teacher()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/addTeacher')
                ->assertSee('Docent Aanmaken')
                ->type('name', 'testTeacher')
                ->type('email', 'test@mail.com')
                ->press('Docent Opslaan')
                ->assertPathIs('/admin');
        });
    }

    public function test_create_course()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/addCourse')
                ->assertSee('Course Aanmaken')
                ->type('name', 'testCourse')
                ->type('period', '7')
                ->select('coordinator')
                ->select('test_method')
                ->type('study_points', '5')
                ->press('Opslaan')
                ->assertPathIs('/admin');
        });
    }
}
