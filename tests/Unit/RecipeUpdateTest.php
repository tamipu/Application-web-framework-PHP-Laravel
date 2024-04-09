<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Recipe;



class RecipeUpdateTest extends TestCase
{
    /**
     * Test if the recipe can be updated successfully.
     */
    public function test_recipe_update(): void
    {
        // Create a new recipe
        $recipe = Recipe::create([
            'title' => 'Old Recipe',
            'content' => 'This is the old recipe.',
            'ingredients' => 'Test Ingredients',
            'price' => 10.99,
            'user_id' => 1,
            'photo' => 'test.jpg',
            'servings' => 4,
            'prep_time' => 10,
            'cook_time' => 20,
            'difficulty' => 'easy',

        ]);

        // Make a request to update the recipe
        $response = $this->put('/recipe/' . $recipe->id, [
            'title' => 'New Recipe',
            'content' => 'This is the updated recipe.',
            'ingredients' => 'Test Ingredients',
            'price' => 10.99,
            'user_id' => 1,
            'photo' => 'test.jpg',
            'servings' => 4,
            'prep_time' => 10,
            'cook_time' => 20,
            'difficulty' => 'easy',

        ]);

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the recipe has been updated in the database
        $this->assertDatabaseHas('recipes', [
            'id' => $recipe->id,
            'title' => 'New Recipe',
            'content' => 'This is the updated recipe.',
            'ingredients' => 'Test Ingredients',
            'price' => 10.99,
            'user_id' => 1,
            'photo' => 'test.jpg',
            'servings' => 4,
            'prep_time' => 10,
            'cook_time' => 20,
            'difficulty' => 'easy',

        ]);
    }
}

