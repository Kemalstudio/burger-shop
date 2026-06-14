<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.product')->get();
        return view('orders.index', compact('orders'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
            'delivery_address' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $userId = Auth::id();
        $cartItems = CartItem::where('user_id', $userId)->get();
        if ($cartItems->isEmpty()) {
            return back()->with('error', 'Корзина пуста');
        }

        $subtotal = $cartItems->reduce(function ($carry, $item) {
            return $carry + ($item->unit_price * $item->quantity);
        }, 0);

        $delivery = 0;
        $total = $subtotal + $delivery;

        $order = Order::create([
            'user_id' => $userId,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'delivery_address' => $request->delivery_address,
            'comment' => $request->comment,
            'subtotal' => $subtotal,
            'delivery_price' => $delivery,
            'total' => $total,
            'status' => 'Новый',
        ]);

        foreach ($cartItems as $ci) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $ci->product_id,
                'quantity' => $ci->quantity,
                'unit_price' => $ci->unit_price,
                'selected_additives' => $ci->selected_additives,
            ]);
        }

        CartItem::where('user_id', $userId)->delete();

        return redirect()->route('orders.index')->with('success', 'Заказ создан');
    }
}
