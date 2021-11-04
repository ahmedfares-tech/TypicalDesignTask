<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = Category::pluck('id')->toArray();
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->realText(30),
            'image' => $this->faker->imageUrl(),
            'parent_id' => $this->faker->randomElement($categories),
        ];
    }
}
