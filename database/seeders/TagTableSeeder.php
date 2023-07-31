<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    /**
     * Create a tag using TagFactory
     *
     * @param string $name
     * @param string $slug
     * @return Tag
     */
    private function createTag(string $name, string $slug, string $image): Tag
    {
        return Tag::factory()->create(compact('name', 'slug', 'image'));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $tags = collect([
            $this->createTag('Outdoors', 'outdoors', 'public/tags/outdoors.jpg'),
            $this->createTag('Health', 'health', 'public/tags/health.jpg'),
            $this->createTag('Environment', 'environment', 'public/tags/environment.jpg'),
            $this->createTag('Fitness', 'fitness', 'public/tags/fitness.jpg'),
            $this->createTag('Beauty', 'beauty', 'public/tags/beauty.jpg'),
            $this->createTag('DIY', 'd-i-y', 'public/tags/diy.jpg'),
        ]);

        Post::all()->each(function ($post) use ($tags) {
            $post->syncTags(
                $tags->random(rand(0, $tags->count()))
                    ->take(3)
                    ->pluck('id')
                    ->toArray()
            );
        });
    }
}
