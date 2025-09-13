<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdditiveSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('additives')->delete();

        DB::table('additives')->insert([
            [
                'name' => 'Сыр',
                'price' => 39.99,
                'image' => 'images/additives/cheese.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Помидор',
                'price' => 12.99,
                'image' => 'images/additives/tomato.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Салат Айсберг',
                'price' => 12.99,
                'image' => 'images/additives/lettuce.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Огурец',
                'price' => 15.99,
                'image' => 'images/additives/cucumber.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Колбаса',
                'price' => 49.99,
                'image' => 'images/additives/sausage.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Перец болгарский',
                'price' => 19.99,
                'image' => 'images/additives/bell_pepper.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Лук красный',
                'price' => 9.99,
                'image' => 'images/additives/red_onion.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Кетчуп',
                'price' => 5.99,
                'image' => 'images/additives/ketchup.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Майонез',
                'price' => 6.99,
                'image' => 'images/additives/mayo.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Чесночный соус',
                'price' => 7.99,
                'image' => 'images/additives/garlic_sauce.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Курица гриль',
                'price' => 79.99,
                'image' => 'images/additives/chicken.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Говядина жареная',
                'price' => 99.99,
                'image' => 'images/additives/beef.png',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}