<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true) . ' Diet',
            'description' => $this->faker->paragraph(3),
            'calories' => $this->faker->numberBetween(200, 500),
            'ingredients' => $this->faker->paragraph(2),
            'instructions' => $this->faker->paragraphs(3, true),
            'type' => $this->faker->randomElement(['regular', 'premium']),
            'visibility' => 'public',
            'user_id' => User::factory(),
        ];
    }
}
