<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function index()
    {
        $services = Service::select('id', 'title')->get();
        return view('admin.booking', compact('services'));
    }

    public function list()
    {
        $bookings = Booking::with('service')->get();
        return response()->json(['bookings' => $bookings]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|regex:/^[0-9]{10,15}$/',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $booking = Booking::create($request->all());
        return response()->json(['message' => 'Booking created successfully', 'booking' => $booking], 201);
    }

    public function edit($id)
    {
        $booking = Booking::with('service')->findOrFail($id);
        return response()->json($booking);
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|regex:/^[0-9]{10,15}$/',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $booking->update($request->all());
        return response()->json(['message' => 'Booking updated successfully', 'booking' => $booking]);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return response()->json(['message' => 'Booking deleted successfully']);
    }
}