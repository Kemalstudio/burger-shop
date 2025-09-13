<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Очищаем таблицы перед заполнением, чтобы избежать дубликатов
        DB::table('products')->delete();
        DB::table('categories')->delete();

        // Заполняем категории
        DB::table('categories')->insert([
            ['id' => 1, 'name' => 'Бургеры', 'parent_id' => null],
            ['id' => 2, 'name' => 'Закуски', 'parent_id' => null],
            ['id' => 3, 'name' => 'Напитки', 'parent_id' => null],
            ['id' => 4, 'name' => 'Говяжьи', 'parent_id' => 1],
            ['id' => 5, 'name' => 'Куриные', 'parent_id' => 1],
            ['id' => 6, 'name' => 'Картофель', 'parent_id' => 2],
        ]);

        // Заполняем товары
        DB::table('products')->insert([
            [
                'name' => 'Двойной Чизбургер',
                'description' => 'Две сочные говяжьи котлеты с двойным сыром чеддер.',
                'price' => '120 TMT',
                'image' => 'img/burger/1.png',
                'category_id' => 4
            ],
            [
                'name' => 'Классический Гамбургер',
                'description' => 'Фирменная говяжья котлета, соленый огурчик и лук.',
                'price' => '100 TMT',
                'image' => 'img/burger/2.png',
                'category_id' => 4
            ],
            [
                'name' => 'Чикенбургер',
                'description' => 'Нежная куриная котлета в панировке с листовым салатом.',
                'price' => '85 TMT',
                'image' => 'img/burger/3.png',
                'category_id' => 5
            ],
            [
                'name' => 'Картофель Фри (L)',
                'description' => 'Большая порция хрустящего золотистого картофеля.',
                'price' => '45 TMT',
                'image' => 'img/burger/fries.png',
                'category_id' => 6
            ],
            [
                'name' => 'Кока-Кола 0.5л',
                'description' => 'Классический освежающий напиток.',
                'price' => '15 TMT',
                'image' => 'img/burger/coke.png',
                'category_id' => 3
            ],
        ]);
    }
}