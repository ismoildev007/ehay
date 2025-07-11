<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            [
                'name_uz' => 'Electronics',
                'name_ru' => 'Electronics',
                'name_en' => 'Electronics',
            ],
            [
                'name_uz' => 'Furniture',
                'name_ru' => 'Furniture',
                'name_en' => 'Furniture',
            ],
            [
                'name_uz' => 'Clothing',
                'name_ru' => 'Clothing',
                'name_en' => 'Clothing',
            ],
            [
                'name_uz' => 'Books',
                'name_ru' => 'Books',
                'name_en' => 'Books',
            ],
            [
                'name_uz' => 'Sports',
                'name_ru' => 'Sports',
                'name_en' => 'Sports',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
