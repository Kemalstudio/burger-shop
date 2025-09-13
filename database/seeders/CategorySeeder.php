<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert([
            [
                'id' => 1, // data-filter="parent-1" в HTML
                'name' => 'Новинки',
                'slug' => 'new',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2, // data-filter="parent-2" в HTML
                'name' => 'Бургеры',
                'slug' => 'burgers',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3, // data-filter="parent-3" в HTML
                'name' => 'Роллы',
                'slug' => 'rolls',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4, // data-filter="parent-4" в HTML
                'name' => 'Картофель',
                'slug' => 'fries',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5, // data-filter="parent-5" в HTML
                'name' => 'Напитки',
                'slug' => 'drinks',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6, // data-filter="parent-6" в HTML
                'name' => 'Десерты',
                'slug' => 'desserts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7, // data-filter="parent-7" в HTML
                'name' => 'Соусы',
                'slug' => 'sauces',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}