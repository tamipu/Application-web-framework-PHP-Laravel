<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Recipe;

class RecipeDeleteTest extends TestCase
{
    /**
     * Test if a recipe can be deleted successfully.
     */
    public function test_recipe_delete(): void
    {
        // Créer une nouvelle recette
        $recipe = Recipe::factory()->create();

        // Faire une requête pour supprimer la recette
        $response = $this->delete('/recipe/' . $recipe->id);

        // Assurer que la réponse a un code de statut 302 (redirection)
        $response->assertStatus(302);

        // Vérifier que la recette a été supprimée de la base de données
        $this->assertDatabaseMissing('recipes', ['id' => $recipe->id]);
    }
}
