<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $items = CartItem::with('product')->where('user_id', Auth::id())->get();
        return view('cart.index', compact('items'));
    }

    public function add(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
            'selected_additives' => 'nullable|array',
        ]);

        $userId = Auth::id();
        $product = Product::findOrFail($data['product_id']);
        $quantity = $data['quantity'] ?? 1;

        $item = CartItem::firstOrNew([
            'user_id' => $userId,
            'product_id' => $product->id,
        ]);

        $item->unit_price = $product->price;
        $item->quantity = ($item->exists ? $item->quantity + $quantity : $quantity);
        $item->selected_additives = $data['selected_additives'] ?? null;
        $item->save();

        return response()->json(['ok' => true, 'message' => 'Добавлено в корзину']);
    }

    public function remove(Request $request)
    {
        $id = $request->input('id');
        $item = CartItem::where('id', $id)->where('user_id', Auth::id())->first();
        if ($item) $item->delete();
        return back();
    }
}
