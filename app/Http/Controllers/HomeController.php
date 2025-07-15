<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::select('id', 'title', 'description', 'image', 'type')->get();
        $sliders = Slider::orderBy('order')->get();
        $reviews = Review::with('service', 'user')->orderBy('created_at', 'desc')->get();
        return view('index', compact('services', 'sliders', 'reviews'));
    }

    public function showService($id)
    {
        $service = Service::select('id', 'title', 'description', 'image', 'type')
            ->with(['reviews' => function ($query) {
                $query->with('user')->orderBy('created_at', 'desc');
            }])
            ->findOrFail($id);
        $relatedServices = Service::select('id', 'title', 'description', 'image', 'type')
            ->where('type', $service->type)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();
        return view('servicedetails', compact('service', 'relatedServices'));
    }

    public function services()
    {
        $services = Service::select('id', 'title', 'description', 'image', 'type')
            ->with(['reviews' => function ($query) {
                $query->select('id', 'service_id', 'rating');
            }])
            ->get();
        $reviews = Review::with('service', 'user')->orderBy('created_at', 'desc')->take(3)->get();
        return view('services', compact('services', 'reviews'));
    }

    public function about()
    {
        $reviews = Review::with('service', 'user')->orderBy('created_at', 'desc')->get();
        return view('about', compact('reviews'));
    }
    public function booking()
    {
        $services = Service::select('id', 'title')->get();
        $reviews = Review::with('service', 'user')->orderBy('created_at', 'desc')->take(3)->get();
        return view('booking', compact('services', 'reviews'));
    }
    public function storeBooking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|regex:/^[0-9]{10,15}$/',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'service_id' => $request->service_id,
            'date' => $request->date,
            'time' => $request->time,
            'notes' => $request->notes,
        ]);

        return redirect()->route('booking')->with('success', 'Booking successfully created!');
    }
    public function storeReview(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Review::create([
            'service_id' => $request->service_id,
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('service.details', $id)->with('success', 'Review submitted successfully!');
    }
    public function portfolio()
    {
        $portfolios = Portfolio::with('service')->get();
        return view('portfolio', compact('portfolios'));
    }
        public function terms()
    {
        return view('termsandservice');
    }
}