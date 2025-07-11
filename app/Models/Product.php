<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'slug_uz', 'slug_ru', 'slug_en',
        'name_uz', 'name_ru', 'name_en',
        'content_uz', 'content_ru', 'content_en',
        'description_uz', 'description_ru', 'description_en',
        'image', 'images',
        'type',
        'price', 'discount_percent', 'final_price'
    ];

    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2',
        'final_price' => 'decimal:2',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            $product->slug_uz = Str::slug($product->name_uz);
            $product->slug_ru = Str::slug($product->name_ru);
            $product->slug_en = Str::slug($product->name_en);

            if ($product->discount_percent) {
                $product->final_price = $product->price * (1 - $product->discount_percent / 100);
            } else {
                $product->final_price = $product->price;
            }
        });
    }

    public static function typeArr()
    {
        return [
            1 => "<span class='text-primary'>Special Offers</span>",
            2 => "<span class='text-success'>Popular Products</span>",
            4 => "<span class='text-warning'>Top Rated Products</span>",
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
