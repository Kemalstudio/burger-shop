<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->paginate(20);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,gif,webp|max:5120',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            $data['image'] = "/storage/{$path}";
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        Slider::create($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Слайд создан');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,gif,webp|max:5120',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'is_active' => 'sometimes|boolean',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('sliders', 'public');
            $data['image'] = "/storage/{$path}";
        }

        $data['is_active'] = $request->has('is_active') ? 1 : 0;

        $slider->update($data);
        return redirect()->route('admin.sliders.index')->with('success', 'Слайд обновлён');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Слайд удалён');
    }
}
