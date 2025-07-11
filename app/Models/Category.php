<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'slug_uz', 'slug_ru', 'slug_en',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            // Sluglar avtomatik hosil bo'lishi
            $product->slug_uz = Str::slug($product->name_uz);
            $product->slug_ru = Str::slug($product->name_ru);
            $product->slug_en = Str::slug($product->name_en);
        });
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
