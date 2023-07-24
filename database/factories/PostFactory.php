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
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . now()->getPreciseTimestamp(3)),
            'body' => $this->faker->paragraph(10),
            'author_id' => $attribute['author_id'] ?? User::factory(),
            'image' => 'public/posts/stock-' . $this->faker->randomElement(['one', 'two', 'three', 'four', 'five']) . '.jpg',
            'published_at' => now(),
            'type' => $this->faker->randomElement(['standard', 'premium']),
            'is_commentable' => rand(0, 1),
        ];
    }
}
