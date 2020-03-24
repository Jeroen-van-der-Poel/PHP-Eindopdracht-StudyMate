<?php

namespace Tests\Browser;

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

    public function test_Can_Click_Add_Deadline()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Register');
        });
    }
}
