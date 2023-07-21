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
    private function createTag(string $name, string $slug): Tag
    {
        return Tag::factory()->create(compact('name', 'slug'));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = Tag::factory()->count(6)->create();

        // $tags = collect([
        //     $this->createTag('Outdoors', 'outdoors'),
        //     $this->createTag('Health', 'health'),
        //     $this->createTag('Environment', 'environment'),
        //     $this->createTag('Fitness', 'fitness'),
        //     $this->createTag('Beauty', 'beauty'),
        //     $this->createTag('DIY', 'd-i-y'),
        // ]);

        // Post::all()->each(function ($post) use ($tags) {
        //     $post->syncTags(
        //         $tags->random(rand(0, $tags->count()))
        //             ->take(3)
        //             ->pluck('id')
        //             ->toArray()
        //     );
        // });
    }
}
