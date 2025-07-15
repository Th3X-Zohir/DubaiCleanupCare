<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.slider', compact('sliders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|max:5120',
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('sliders', 'public');
            Slider::create([
                'image_path' => $imagePath,
                'title' => $request->title,
                'short_description' => $request->short_description,
                'order' => $request->order,
            ]);
        }

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully.');
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:500',
            'order' => 'required|integer',
            'image_path' => 'nullable|image|max:5120',
        ]);

        if ($request->hasFile('image_path')) {
            Storage::disk('public')->delete($slider->image_path);
            $imagePath = $request->file('image_path')->store('sliders', 'public');
            $slider->image_path = $imagePath;
        }

        $slider->title = $request->title;
        $slider->short_description = $request->short_description;
        $slider->order = $request->order;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('public')->delete($slider->image_path);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }
}