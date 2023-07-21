<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20) . uniqid();
        return [
            'name' => $title,
            'slug' => Str::slug($title),
            'image' => 'stock-one.jpg',
            'description' => $this->faker->paragraph(),
        ];
    }
}
