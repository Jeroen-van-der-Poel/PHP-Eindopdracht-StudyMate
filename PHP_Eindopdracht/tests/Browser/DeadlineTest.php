<?php

namespace Tests\Browser;

use App\Course;
use App\Teacher;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeadlineTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function test_CanAddDeadline()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                ->visit('/addDeadline')
                ->assertSee('Deadline aanmaken')
                ->type('title', 'TestDeadline')
                ->select('teacher_id')
                ->select('course_id')
                ->type('duedate', '7')
                ->type('duedate', '4')
                ->type('duedate', '2020')
                ->keys('#duedate', ['{tab}'])
                ->type('duedate', '2222')
                ->press('Deadline Opslaan')
                ->assertPathIs('/deadline');
        });
    }

    public function test_checkbox()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(2))
                ->visit('/deadline')
                ->check('finished[]')
                ->press('Opslaan')
                ->assertPathIs('/deadline');
        });
    }
}
