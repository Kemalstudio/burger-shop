<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->with('items.product')->latest()->get();
        return view('profile.show', compact('user', 'orders'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:255',
        ]);

        Auth::user()->update($data);
        return redirect()->route('profile.show')->with('success', 'Профиль обновлён');
    }
}
