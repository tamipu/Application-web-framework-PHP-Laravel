<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;


class RecipeCreateBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * @group create-recipe
     */
    public function test_recipe_creation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->visit('/recipe')
                    ->clickLink('/admin/recipes/create')
                    ->assertSee('Créer une recette')
                    ->type('title', 'New Recipe')
                    ->type('content', 'New Content')
                    ->type('ingredients', 'New Ingredients')
                    ->type('price', 10.99)
                    ->press('ENREGISTRER');
    });
}

}
