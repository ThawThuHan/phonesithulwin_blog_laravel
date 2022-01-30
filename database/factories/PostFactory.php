<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence,
            "content" => $this->faker->paragraph,
            "category_id" => rand(1, 5),
            "image" => $this->faker->image("public/storage/post_images", fullPath: false),
            "view_count" => rand(100, 500),
        ];
    }
}
