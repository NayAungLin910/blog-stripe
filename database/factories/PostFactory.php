<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraph(2),
            'author_id' => $attribute['author_id'] ?? User::factory(),
            'image' => 'stock-one.jpg',
            'published_at' => now(),
            'type' => $this->faker->randomElement(['standard', 'premium']),
            'is_commentable' => rand(0, 1),
        ];
    }
}
