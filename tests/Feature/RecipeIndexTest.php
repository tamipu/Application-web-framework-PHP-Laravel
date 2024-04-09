<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Recipe;

class RecipeIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipe_index()
    {
        // Créer quelques recettes pour tester l'affichage
        Recipe::factory()->count(3)->create();

        // Effectuer une requête HTTP GET vers la page d'accueil
        $response = $this->get('/');

        // Vérifier que la réponse est réussie (statut 200)
        $response->assertStatus(200);

        // Vérifier la présence de la liste des recettes
        $response->assertSee('Liste des recettes');

        // Vérifier que les recettes sont affichées
        $response->assertSee('Nom de la recette 1');
        $response->assertSee('Nom de la recette 2');
        $response->assertSee('Nom de la recette 3');
    }
}
