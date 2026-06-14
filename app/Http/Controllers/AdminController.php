<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::count();
        $orders = Order::count();
        $products = Product::count();
        $sliders = Slider::count();
        $recentOrders = Order::with('user')->latest()->limit(10)->get();

        return view('admin.dashboard', compact('users', 'orders', 'products', 'sliders', 'recentOrders'));
    }

    public function ordersIndex()
    {
        $orders = Order::with('user', 'items.product')->latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function orderShow(Order $order)
    {
        $order->load('user', 'items.product');
        return view('admin.orders.show', compact('order'));
    }

    public function orderUpdateStatus(Request $request, Order $order)
    {
        $data = $request->validate([
            'status' => 'required|string',
        ]);

        $order->update($data);
        return back()->with('success', 'Статус заказа обновлён');
    }
}
