<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            'Featured',
            'Popular Products',
            'Best Seller',
            'Special Offers',
            'Top Rated Products'
        ];

        $categories = Category::all();

        foreach ($types as $index => $type) {
            for ($i = 1; $i <= 2; $i++) {
                $category = $categories[$index % $categories->count()];
                $name = $type . " Product $i";

                Product::create([
                    'category_id' => $category->id,
                    'name_uz' => $name . " UZ",
                    'name_ru' => $name . " RU",
                    'name_en' => $name . " EN",
                    'slug_uz' => Str::slug($name . " UZ"),
                    'slug_ru' => Str::slug($name . " RU"),
                    'slug_en' => Str::slug($name . " EN"),
                    'description_uz' => "Tavsif (UZ) $name",
                    'description_ru' => "Описание (RU) $name",
                    'description_en' => "Description (EN) $name",
                    'content_uz' => "Kontent (UZ) $name",
                    'content_ru' => "Контент (RU) $name",
                    'content_en' => "Content (EN) $name",
                    'image' => 'default.jpg',
                    'images' => json_encode(['img1.jpg', 'img2.jpg']),
                    'type' => $type,
                    'price' => rand(100, 500),
                    'discount_percent' => rand(10, 30),
                    // final_price avtomatik hisoblanadi boot() ichida
                ]);
            }
        }
    }
}
