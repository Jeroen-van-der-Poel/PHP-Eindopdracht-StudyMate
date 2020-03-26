<?php

namespace Tests\Browser;

use App\Course;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Tests\Browser\Pages\HomePage;
use Tests\DuskTestCase;

class DashboardTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

    public function test_All_Elements_Available()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage())
                ->assertAllElementsVisible();
        });
    }


    public function test_connection(){
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage())
                ->countStudyPoints();
        });
    }
}
