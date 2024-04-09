<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RecipeNavigationTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group navigation
     */

    public function test_navigation_to_homepage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Reecceettee');
        });
    }
}
