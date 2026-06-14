<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Additive;
use Illuminate\Support\Facades\Storage;

class AdminAdditiveController extends Controller
{
    public function index()
    {
        $additives = Additive::paginate(50);
        return view('admin.additives.index', compact('additives'));
    }

    public function create()
    {
        return view('admin.additives.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('additives', 'public');
            $data['image'] = "/storage/{$path}";
        }

        Additive::create($data);
        return redirect()->route('admin.additives.index')->with('success', 'Добавка создана');
    }

    public function edit(Additive $additive)
    {
        return view('admin.additives.edit', compact('additive'));
    }

    public function update(Request $request, Additive $additive)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('additives', 'public');
            $data['image'] = "/storage/{$path}";
        }

        $additive->update($data);
        return redirect()->route('admin.additives.index')->with('success', 'Добавка обновлена');
    }

    public function destroy(Additive $additive)
    {
        $additive->delete();
        return redirect()->route('admin.additives.index')->with('success', 'Добавка удалена');
    }
}
