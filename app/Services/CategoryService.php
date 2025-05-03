<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryService {

    public function store(array $data, $image = null) {
        $baseSlug = Str::slug($data['title']);
        $slug = $baseSlug;
        $count = 1;

        // Ensure the slug is unique
        while (Category::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        $category = Category::create($data);

        if ($image) {
            $category->addmedia($image)->toMediaCollection();
        }
    }

    public function update(array $data, Category $category, $image = null) {

        $baseSlug = Str::slug($data['title']);
        $slug = $baseSlug;
        $count = 1;

        while (
            Category::where('slug', $slug)
                ->where('id', '!=', $category->id)
                ->exists()
        ) {
            $slug = $baseSlug . '-' . $count++;
        }

        $data['slug'] = $slug;

        $category->update($data);

        if ($image) {
            if ($category->hasMedia()) {
                $category->clearMediaCollection();
            }
            $category->addmedia($image)->toMediaCollection();
        }
    }
}
