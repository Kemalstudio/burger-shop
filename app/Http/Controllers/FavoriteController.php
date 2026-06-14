<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('product')->where('user_id', Auth::id())->get();
        return view('favorites.index', compact('favorites'));
    }

    public function toggle(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $userId = Auth::id();
        $fav = Favorite::where('user_id', $userId)->where('product_id', $data['product_id'])->first();
        if ($fav) {
            $fav->delete();
            return response()->json(['ok' => true, 'removed' => true]);
        }

        Favorite::create(['user_id' => $userId, 'product_id' => $data['product_id']]);
        return response()->json(['ok' => true, 'removed' => false]);
    }
}
