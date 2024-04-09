<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\Validator;

class RecipeValidationTest extends TestCase
{
        /**
         * Test if the recipe title is required.
         */
        public function testRecipeTitleIsRequired()
        {
            $data = [
                'title' => 'Recipe Title',
                'content' => 'Recipe Description',
                'ingredients' => 'Recipe Ingredients',
                'price' => 10.99,
                'user_id' => 1,
                'photo' => 'test.jpg',
                'servings' => 4,
                'prep_time' => 10,
                'cook_time' => 20,
                'difficulty' => 'easy',

            ];

            $validator = Validator::make($data, [
                'title' => 'required',
            ]);

            $this->assertTrue($validator->fails());
        }

        /**
         * Test if the recipe description is required.
         */
        public function testRecipeDescriptionIsRequired()
        {
            $data = [
                'title' => 'Recipe Title',
                'content' => 'Recipe Description',
                'ingredients' => 'Recipe Ingredients',
                'price' => 10.99,
                'user_id' => 1,
                'photo' => 'test.jpg',
                'servings' => 4,
                'prep_time' => 10,
                'cook_time' => 20,
                'difficulty' => 'easy',
            ];

            $validator = Validator::make($data, [
                'content' => 'required',
            ]);

            $this->assertTrue($validator->fails());
        }

        /**
         * Test if the recipe ingredients are required.
         */
        public function testRecipeIngredientsAreRequired()
        {
            $data = [
                'title' => 'Recipe Title',
                'content' => 'Recipe Description',
                'ingredients' => 'Recipe Ingredients',
                'price' => 10.99,
                'user_id' => 1,
                'photo' => 'test.jpg',
                'servings' => 4,
                'prep_time' => 10,
                'cook_time' => 20,
                'difficulty' => 'easy',
            ];

            $validator = Validator::make($data, [
                'ingredients' => 'required',
            ]);

            $this->assertTrue($validator->fails());
        }

        /**
         * Test if the recipe price is required.
         */
        public function testRecipePriceIsRequired()
        {
            $data = [
                'title' => 'Recipe Title',
                'content' => 'Recipe Description',
                'ingredients' => 'Recipe Ingredients',
                'price' => 10.99,
                'user_id' => 1,
                'photo' => 'test.jpg',
                'servings' => 4,
                'prep_time' => 10,
                'cook_time' => 20,
                'difficulty' => 'easy',
            ];

            $validator = Validator::make($data, [
                'price' => 'required',
            ]);

            $this->assertTrue($validator->fails());
        }

    }
