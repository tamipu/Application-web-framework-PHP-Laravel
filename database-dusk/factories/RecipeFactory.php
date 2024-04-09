<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         //$title = $this->faker->sentence($nbWords = 6, $variableNbWords = true);
    $title = $this->faker->company();
    $this->faker->addProvider(new \FakerRestaurant\Provider\fr_FR\Restaurant($this->faker));
    $title = $this->faker->numerify($this->faker->foodName(). ' ###');


    return [
        'user_id' => \App\Models\User::factory(),
        'title' => $title,
        'content' => $this->faker->paragraph($nbSentences = 10, $variableNbSentences = true),
        'ingredients' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
        'price' => $this->faker->randomNumber(2),
        'url' => str_replace(' ', '-', $title),
        'tags' => $this->faker->words($nb = 3, $asText = true),
        'status' => 'published',
    ];
    }
}
