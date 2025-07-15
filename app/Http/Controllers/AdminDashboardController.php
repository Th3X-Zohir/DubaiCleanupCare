<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\booking;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $adminUsers = User::where('is_admin', 1)->count();
        $cleaningServices = Service::where('type', 'Cleaning')->count();
        $maintenanceServices = Service::where('type', 'Maintenance')->count();
        $totalBookings = Booking::count();
        
        $totalReviews = Review::count();
        $averageRating = Review::avg('rating') ?? 0;

        return view('admin.dashboard', compact(
            'totalUsers', 'adminUsers', 'cleaningServices', 'maintenanceServices',
            'totalBookings', 'totalReviews', 'averageRating'
        ));
    }
}