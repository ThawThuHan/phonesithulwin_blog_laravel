<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $image_list = [];
        for ($i = 0; $i < 3; $i++) {
            array_push($image_list, $this->faker->image("public/storage/book_images/", fullPath: false));
        }
        $images = implode(", ", $image_list);
        return [
            "name" => $this->faker->word,
            "preview_content" => $this->faker->paragraph,
            "images" => $images,
            "price" => rand(10000, 20000),
            "order_count" => rand(1, 5),
            "release_date" => $this->faker->date,
            "features" => "Pages 255, Myanmar",
        ];
    }
}
