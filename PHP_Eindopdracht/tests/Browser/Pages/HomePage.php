<?php

namespace Tests\Browser\Pages;

use App\Course;
use Laravel\Dusk\Browser;

class HomePage extends Page
{
    /**
     * Get the URL for the page.
     *
     * @return string
     */
    public function url()
    {
        return '/dashboard';
    }

    /**
     * Assert that the browser is on the page.
     *
     * @param  \Laravel\Dusk\Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        //
    }

    /**
     * Get the element shortcuts for the page.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }

    public function assertAllElementsVisible(Browser $browser) {
        $courses = Course::all();
        foreach ($courses as $course) {
            $browser->assertSee($course->name);
        }
    }

    public function countStudyPoints(Browser $browser) {
        $courses = Course::all();
        $count = 0;
        foreach ($courses as $course) {
           $count += $course->points_received;
        }
        $browser->assertSee($count);
    }
}
