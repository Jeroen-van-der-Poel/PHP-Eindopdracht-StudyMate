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

    public function testAllElementsAvailable()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(new HomePage())
                ->assertAllElementsVisible();
        });
    }

}
