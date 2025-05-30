<?php

namespace App\Services;

use App\Models\Post;
use Auth;
use Str;

class PostService {
    public function store(array $data, $image = null) {

        $baseSlug = Str::slug($data['title']);
        $slug = $baseSlug;
        $count = 1;

        // Ensure the slug is unique
        while (Post::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        $data['slug'] = $slug;
        $data['user_id'] = Auth::id();

        $post = Post::create($data);
        if ($image) {
            $post->addMedia($image)->toMediaCollection();
        }

        $post->categories()->sync($data['categories']);
        $post->tags()->sync($data['tags']);
    }
    public function update(Post $post, array $data, $image = null) {

        $baseSlug = Str::slug($data['title']);
        $slug = $baseSlug;
        $count = 1;

        while (
            Post::where('slug', $slug)
                ->where('id', '!=', $post->id)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        $post->update($data);
        if ($image) {
            if ($post->hasMedia()) {
                $post->clearMediaCollection();
            }
            $post->addMedia($image)->toMediaCollection();
        }

        $post->categories()->sync($data['categories']);
        $post->tags()->sync($data['tags']);
    }
}
