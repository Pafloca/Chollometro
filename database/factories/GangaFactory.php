<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
            'url' => $this->faker->imageUrl,
            'category' => Category::inRandomOrder()->first(),
            'likes' => $this->faker->numberBetween(1, 100),
            'unlikes' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 0, 500),
            'price_sale' => $this->faker->randomFloat(2, 0, 500),
            'available' => $this->faker->boolean,
            'user_id' => User::inRandomOrder()->first()
        ];
    }
}
