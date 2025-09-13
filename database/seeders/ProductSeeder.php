<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Additive;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Очищаем таблицы перед заполнением
        Product::query()->delete();
        DB::table('additive_product')->delete();

        // Получаем все добавки один раз для оптимизации
        $allAdditives = Additive::all();

        // --- Создаем логические группы добавок ---
        
        // Стандартные добавки для мясных бургеров
        $burgerAdditives = $allAdditives->whereIn('name', [
            'Сыр', 'Помидор', 'Салат Айсберг', 'Огурец', 'Лук красный', 'Кетчуп', 'Майонез', 'Чесночный соус'
        ])->pluck('id');

        // Добавки для веганского бургера (без животных продуктов)
        $veganAdditives = $allAdditives->whereIn('name', [
            'Помидор', 'Салат Айсберг', 'Огурец', 'Перец болгарский', 'Лук красный', 'Кетчуп'
        ])->pluck('id');

        // Добавки, подходящие к роллам
        $rollAdditives = $allAdditives->whereIn('name', [
            'Сыр', 'Помидор', 'Перец болгарский', 'Курица гриль', 'Чесночный соус'
        ])->pluck('id');

        // Добавки для картофеля
        $friesAdditives = $allAdditives->whereIn('name', [
            'Кетчуп', 'Майонез', 'Чесночный соус'
        ])->pluck('id');


        // Полный массив с данными о товарах
        $productsData = [
            // --- БУРГЕРЫ ---
            [
                'name' => 'Чизбургер',
                'description' => 'Фирменный приготовленный на огне бифштекс из 100% говядины с ломтиком слегка расплавленного сыра, хрустящим маринованным огурчиком, луком, горчицей и кетчупом.',
                'price' => 35.50, 'image' => 'https://img.freepik.com/free-photo/delicious-cheeseburger_1232-503.jpg', 'category_id' => 2, 'weight' => 114,
                'default_ingredients' => 'Сыр,Кетчуп,Горчица,Лук,Маринованные огурцы',
                'is_popular' => true, 'is_new' => false,
                'additives_to_attach' => $burgerAdditives
            ],
            [
                'name' => 'Двойной Гранд Бургер',
                'description' => 'Два сочных бифштекса из 100% говядины, специальный соус, листовой салат, сыр, маринованные огурцы и лук на булочке с кунжутом.',
                'price' => 65.00, 'image' => 'https://img.freepik.com/free-photo/front-view-burger-stand_141793-15542.jpg', 'category_id' => 2, 'weight' => 220,
                'default_ingredients' => 'Соус Гранд,Сыр,Салат,Лук,Маринованные огурцы',
                'is_popular' => true, 'is_new' => true,
                'additives_to_attach' => $burgerAdditives
            ],
            [
                'name' => 'Чикенбургер',
                'description' => 'Обжаренная в панировке куриная котлета с горчичным соусом, свежим салатом Айсберг и майонезом на подрумяненной булочке.',
                'price' => 32.99, 'image' => 'https://img.freepik.com/free-photo/crispy-chicken-burger-with-cheese-and-lettuce_141793-12443.jpg', 'category_id' => 2, 'weight' => 130,
                'default_ingredients' => 'Майонез,Горчичный соус,Салат Айсберг',
                'is_popular' => false, 'is_new' => false,
                'additives_to_attach' => $burgerAdditives
            ],
            [
                'name' => 'Фиш Бургер',
                'description' => 'Нежное филе белой рыбы в хрустящей панировке с соусом тар-тар и половиной ломтика сыра на пышной булочке.',
                'price' => 38.50, 'image' => 'https://img.freepik.com/free-photo/fish-burger-with-fries_1339-1229.jpg', 'category_id' => 2, 'weight' => 125,
                'default_ingredients' => 'Соус Тар-Тар,Сыр',
                'is_popular' => false, 'is_new' => false,
                'additives_to_attach' => $burgerAdditives->except($allAdditives->where('name', 'Говядина жареная')->first()->id) // Убираем говядину
            ],
            [
                'name' => 'Веган Бургер',
                'description' => 'Сочная котлета из растительного мяса со свежими овощами, веганским соусом и салатом на мультизлаковой булочке.',
                'price' => 55.00, 'image' => 'https://img.freepik.com/free-photo/vegan-burger-with-fresh-vegetables_141793-16298.jpg', 'category_id' => 2, 'weight' => 180,
                'default_ingredients' => 'Веганский соус,Салат,Помидор,Лук',
                'is_popular' => false, 'is_new' => true,
                'additives_to_attach' => $veganAdditives
            ],
            // --- РОЛЛЫ ---
            [
                'name' => 'Цезарь Ролл',
                'description' => 'Кусочки нежной куриной грудки в панировке, свежий салат, помидоры и тертый сыр с соусом Цезарь в пшеничной лепешке.',
                'price' => 45.00, 'image' => 'https://img.freepik.com/free-photo/chicken-wrap-with-lettuce-tomato-and-cheese_1339-1065.jpg', 'category_id' => 3, 'weight' => 170,
                'default_ingredients' => 'Соус Цезарь,Сыр,Помидор,Салат',
                'is_popular' => true, 'is_new' => false,
                'additives_to_attach' => $rollAdditives
            ],
            [
                'name' => 'Шримп Ролл',
                'description' => 'Сочные королевские креветки в хрустящей панировке, свежий салат и специальный соус в мягкой пшеничной лепешке.',
                'price' => 58.90, 'image' => 'https://img.freepik.com/free-photo/shrimp-wrap-with-vegetables_1339-1678.jpg', 'category_id' => 3, 'weight' => 165,
                'default_ingredients' => 'Специальный соус,Салат',
                'is_popular' => false, 'is_new' => true,
                'additives_to_attach' => $rollAdditives
            ],
             // --- КАРТОФЕЛЬ ---
            [
                'name' => 'Картофель Фри (сред.)',
                'description' => 'Идеально обжаренные, золотистые и хрустящие ломтики картофеля. Классика, которая нравится всем.',
                'price' => 18.00, 'image' => 'https://img.freepik.com/free-photo/side-view-french-fries-with-seasoning_141793-4899.jpg', 'category_id' => 4, 'weight' => 90,
                'default_ingredients' => '',
                'is_popular' => true, 'is_new' => false,
                'additives_to_attach' => $friesAdditives
            ],
            // --- ПРОЧИЕ ТОВАРЫ БЕЗ ДОБАВОК ---
            [
                'name' => 'Сырные палочки (5 шт)',
                'description' => 'Нежная моцарелла в хрустящей панировке, обжаренная до золотистого цвета. Идеально с кисло-сладким соусом.',
                'price' => 25.50, 'image' => 'https://img.freepik.com/free-photo/fried-mozzarella-sticks-with-sauce_141793-12501.jpg', 'category_id' => 4, 'weight' => 110,
                'default_ingredients' => '', 'is_popular' => true, 'is_new' => true,
                'additives_to_attach' => collect()
            ],
            [
                'name' => 'Кока-Кола 0.5л',
                'description' => 'Классический освежающий газированный напиток. Отлично утоляет жажду и дополняет любое блюдо.',
                'price' => 10.00, 'image' => 'https://img.freepik.com/free-photo/cold-coke-with-ice-cubes_144627-18728.jpg', 'category_id' => 5, 'weight' => 500,
                'default_ingredients' => 'Лёд', 'is_popular' => true, 'is_new' => false,
                'additives_to_attach' => collect()
            ],
            [
                'name' => 'Вишневый пирожок',
                'description' => 'Горячий пирожок из хрустящего теста с ароматной начинкой из спелой вишни. Прекрасное завершение обеда.',
                'price' => 15.00, 'image' => 'https://img.freepik.com/free-photo/', 'category_id' => 6, 'weight' => 80,
                'default_ingredients' => '', 'is_popular' => true, 'is_new' => false,
                'additives_to_attach' => collect()
            ],
            [
                'name' => 'Сырный соус',
                'description' => 'Густой и насыщенный соус на основе сыра Чеддер. Идеальное дополнение к картофелю фри и наггетсам.',
                'price' => 5.00, 'image' => 'https://img.freepik.com/free-photo/cheese-sauce-in-a-bowl_1339-952.jpg', 'category_id' => 7, 'weight' => 25,
                'default_ingredients' => '', 'is_popular' => true, 'is_new' => false,
                'additives_to_attach' => collect()
            ]
        ];

        // Создаем товары и привязываем добавки в цикле
        foreach ($productsData as $data) {
            $additivesToAttach = $data['additives_to_attach'];
            unset($data['additives_to_attach']);

            $product = Product::create($data);

            if ($additivesToAttach->isNotEmpty()) {
                $product->additives()->attach($additivesToAttach);
            }
        }
    }
}