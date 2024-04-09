<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Recipe;

class RecipeTest extends TestCase
{
    public function test_recipe_can_be_created()
    {
        $recipe = Recipe::create([
            'title' => 'Test Recipe',
            'content' => 'Test Content',
            'ingredients' => 'Test Ingredients',
            'price' => 10.99,
            'user_id' => 1,
            'photo' => 'test.jpg',
            'servings' => 4,
            'prep_time' => 10,
            'cook_time' => 20,
            'difficulty' => 'easy',

        ]);

        $this->assertInstanceOf(Recipe::class, $recipe);
        $this->assertEquals('Test Recipe', $recipe->title);
        $this->assertEquals('Test Content', $recipe->content);
        $this->assertEquals('Test Ingredients', $recipe->ingredients);
        $this->assertEquals(10.99, $recipe->price);
        $this->assertEquals(1, $recipe->user_id);
        $this->assertEquals('test.jpg', $recipe->photo);
        $this->assertEquals(4, $recipe->servings);
        $this->assertEquals(10, $recipe->prep_time);
        }
        //passe ! recette créée avec succès
}

