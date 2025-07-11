<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsData = [
            [
                'title_uz' => 'Yangi mahsulotlar kelib tushdi',
                'title_ru' => 'Поступили новые товары',
                'title_en' => 'New products arrived',
                'content_uz' => 'Bugun bizning do‘konimizga yangi mahsulotlar kelib tushdi.',
                'content_ru' => 'Сегодня в наш магазин поступили новые товары.',
                'content_en' => 'Today new products have arrived in our store.',
                'date' => '2025-07-09',
                'image' => 'news1.jpg',
            ],
            [
                'title_uz' => 'Chegirmalar haftaligi boshlandi',
                'title_ru' => 'Началась неделя скидок',
                'title_en' => 'Discount week has started',
                'content_uz' => 'Bizda katta chegirmalar haftaligi boshlandi.',
                'content_ru' => 'У нас началась большая неделя скидок.',
                'content_en' => 'Our big discount week has started.',
                'date' => '2025-07-08',
                'image' => 'news2.jpg',
            ],
            [
                'title_uz' => 'Yozgi kolleksiya savdosi boshlandi',
                'title_ru' => 'Стартовала летняя коллекция',
                'title_en' => 'Summer collection sale started',
                'content_uz' => 'Yozgi kolleksiyamiz savdosi boshlandi. Endi xarid qiling!',
                'content_ru' => 'Началась продажа нашей летней коллекции. Покупайте сейчас!',
                'content_en' => 'Our summer collection sale has started. Shop now!',
                'date' => '2025-07-07',
                'image' => 'news3.jpg',
            ],
            [
                'title_uz' => 'Yangi mahsulotlar kelib tushdi',
                'title_ru' => 'Поступили новые товары',
                'title_en' => 'New products arrived',
                'content_uz' => 'Bugun bizning do‘konimizga yangi mahsulotlar kelib tushdi.',
                'content_ru' => 'Сегодня в наш магазин поступили новые товары.',
                'content_en' => 'Today new products have arrived in our store.',
                'date' => '2025-07-09',
                'image' => 'news1.jpg',
            ],
            [
                'title_uz' => 'Chegirmalar haftaligi boshlandi',
                'title_ru' => 'Началась неделя скидок',
                'title_en' => 'Discount week has started',
                'content_uz' => 'Bizda katta chegirmalar haftaligi boshlandi.',
                'content_ru' => 'У нас началась большая неделя скидок.',
                'content_en' => 'Our big discount week has started.',
                'date' => '2025-07-08',
                'image' => 'news2.jpg',
            ],
            [
                'title_uz' => 'Yozgi kolleksiya savdosi boshlandi',
                'title_ru' => 'Стартовала летняя коллекция',
                'title_en' => 'Summer collection sale started',
                'content_uz' => 'Yozgi kolleksiyamiz savdosi boshlandi. Endi xarid qiling!',
                'content_ru' => 'Началась продажа нашей летней коллекции. Покупайте сейчас!',
                'content_en' => 'Our summer collection sale has started. Shop now!',
                'date' => '2025-07-07',
                'image' => 'news3.jpg',
            ]
        ];

        foreach ($newsData as $data) {
            News::create($data);
        }
    }
}
