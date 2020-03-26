<?php

namespace Tests\Browser;

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
            $browser->visit('/addTeacher')
                ->assertSee('Docent Aanmaken')
                ->type('name', 'testTeacher')
                ->type('email', 'test@mail.com')
                ->type('phone_number', '0689231100')
                ->press('Docent Opslaan')
                ->assertPathIs('/admin');
        });
    }

    public function test_create_course()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/addCourse')
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
