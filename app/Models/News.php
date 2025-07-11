<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_uz', 'title_ru', 'title_en',
        'slug_uz', 'slug_ru', 'slug_en',
        'content_uz', 'content_ru', 'content_en',
        'date', 'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            // Sluglar avtomatik hosil bo'lishi
            $product->slug_uz = Str::slug($product->title_uz);
            $product->slug_ru = Str::slug($product->title_ru);
            $product->slug_en = Str::slug($product->title_en);
        });
    }
}
