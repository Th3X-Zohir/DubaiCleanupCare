<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
  
    public function index()
    {
        return view('admin.services');
    }

    public function list(Request $request)
    {
        $services = Service::select('id', 'type', 'title', 'description', 'image')->get();
        return response()->json(['services' => $services]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|in:Cleaning,Maintenance',
            'title' => 'required|string', // Removed max:255
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif', // Removed max:2048
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('services', 'public');
        }

        $service = Service::create([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return response()->json(['message' => 'Service created successfully', 'service' => $service], 201);
    }

    public function edit(Service $service)
    {
        return response()->json($service);
    }

    public function update(Request $request, Service $service)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'nullable|in:Cleaning,Maintenance',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = array_filter([
            'type' => $request->type,
            'title' => $request->title,
            'description' => $request->description,
        ], function ($value) {
            return !is_null($value);
        });

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('services', 'public');
        }

        $service->update($data);

        return response()->json(['message' => 'Service updated successfully', 'service' => $service]);
    }

    public function destroy(Service $service)
    {
        // Delete image if exists
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();
        return response()->json(['message' => 'Service deleted successfully']);
    }
}