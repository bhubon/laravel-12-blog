<?php

namespace Database\Seeders;

use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = \App\Models\Category::all();
        $tags = \App\Models\Tag::all();
        PostFactory::new()->count(10)->create()->each(function ($post) use ($categories, $tags) {
            $post->categories()->sync($categories->random(2)->pluck('id')->toArray());
            $post->tags()->sync($tags->random(2)->pluck('id')->toArray());
        });
    }
}
