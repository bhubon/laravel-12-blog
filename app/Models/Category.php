<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model implements HasMedia  {
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory,InteractsWithMedia;

    public const PLACEHOLDER_IMAGE_PATH = 'images/placeholder.jpeg';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'meta_title',
        'meta_description',
    ];


    public function posts() {
        return $this->belongsToMany(Post::class);
    }

    public function getImageUrlAttribute(){
        return $this->hasMedia()
            ? $this->getFirstMediaUrl()
            : asset(self::PLACEHOLDER_IMAGE_PATH);
    }
}
