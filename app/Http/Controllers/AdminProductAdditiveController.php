<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Additive;

class AdminProductAdditiveController extends Controller
{
    public function edit(Product $product)
    {
        $product->load('additives');
        $allAdditives = Additive::all();
        return view('admin.products.additives', compact('product', 'allAdditives'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'additives' => 'nullable|array',
            'additives.*' => 'exists:additives,id',
        ]);

        $additives = $data['additives'] ?? [];
        $product->additives()->sync($additives);

        return redirect()->route('admin.products.index')->with('success', 'Добавки обновлены');
    }
}
