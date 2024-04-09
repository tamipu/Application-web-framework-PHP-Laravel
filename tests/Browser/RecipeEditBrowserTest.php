<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RecipeEditBrowserTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_recipe_edit()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/admin/recipes')
                    ->clickLink('Editer')
                    ->assertSee('Modifier une recette')
                    ->type('Titre', 'Modified Recipe')
                    ->type('Contenu', 'Modified Content')
                    ->type('Ingrédients', 'Modified Ingredients')
                    ->type('Prix', 20.99)
                    ->type('Nombre de personnes', 6)
                    ->press('ENREGISTRER');
        });
    }
}
