<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeadlineTests extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function Can_Click_Add_Deadline()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/addDeadline')
                    ->assertSee('Deadline aanmaken');
        });
    }
}
