<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        // Получаем все родительские категории
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        // Получаем все товары и сразу подгружаем связанные с ними добавки
        $products = Product::with('additives')->get();

        return view('menu', [
            'categories' => $categories,
            'products' => $products
        ]);
    }
}