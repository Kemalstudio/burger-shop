<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'category_id' => 'nullable|exists:categories,id',
            'weight' => 'nullable|integer',
            'default_ingredients' => 'nullable|string',
            'is_popular' => 'sometimes|boolean',
            'is_new' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = "/storage/{$path}";
        }

        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;

        Product::create($data);
        return redirect()->route('admin.products.index')->with('success', 'Товар создан');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'category_id' => 'nullable|exists:categories,id',
            'weight' => 'nullable|integer',
            'default_ingredients' => 'nullable|string',
            'is_popular' => 'sometimes|boolean',
            'is_new' => 'sometimes|boolean',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $data['image'] = "/storage/{$path}";
        }

        $data['is_popular'] = $request->has('is_popular') ? 1 : 0;
        $data['is_new'] = $request->has('is_new') ? 1 : 0;

        $product->update($data);
        return redirect()->route('admin.products.index')->with('success', 'Товар обновлён');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Товар удалён');
    }
}
