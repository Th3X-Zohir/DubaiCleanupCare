@extends('layouts.admin.admin')

@section('title', 'Admin Dashboard - Dubai Cleanup & Maintenance')

@section('content')
    <div class="space-y-8 animate-fade-in-up">
        <header class="flex justify-between items-center">
            <h1 class="text-4xl font-bold text-gray-800">Admin Dashboard</h1>
            <span class="text-sm text-gray-500">Last updated: {{ now()->format('M d, Y H:i') }}</span>
        </header>
        <p class="text-lg text-gray-600">Welcome to the admin panel. Monitor and manage your platform with ease.</p>

        <!-- Quick Overview Block -->
        <div class="grid grid-cols-1 gap-8">
            <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-transform hover:scale-[1.02] duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-[#36a3dc] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    Quick Overview
                </h2>
                <div class="grid grid-cols-4 gap-4">
                    <div class="text-center">
                        <p class="text-2xl font-bold text-[#36a3dc]">{{ $totalUsers }}</p>
                        <p class="text-sm text-gray-600">Users</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-[#36a3dc]">{{ $totalBookings }}</p>
                        <p class="text-sm text-gray-600">Bookings</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-[#36a3dc]">{{ $cleaningServices + $maintenanceServices }}</p>
                        <p class="text-sm text-gray-600">Services</p>
                    </div>
                    <div class="text-center">
                        <p class="text-2xl font-bold text-[#36a3dc]">{{ $totalReviews }}</p>
                        <p class="text-sm text-gray-600">Reviews</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Other Blocks -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Users Block -->
            <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-transform hover:scale-[1.02] duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-[#36a3dc] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    User Statistics
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Total Users</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $totalUsers }}</p>
                    </div>
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Admin Users</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $adminUsers }}</p>
                    </div>
                </div>
                <a href="/admin/users" class="mt-6 inline-block text-[#36a3dc] hover:text-[#2b8cc4] font-semibold nav-link">Manage Users</a>
            </div>

            <!-- Services Block -->
            <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-transform hover:scale-[1.02] duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-[#36a3dc] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                    </svg>
                    Service Statistics
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Cleaning Services</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $cleaningServices }}</p>
                    </div>
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Maintenance Services</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $maintenanceServices }}</p>
                    </div>
                </div>
                <a href="/admin/services" class="mt-6 inline-block text-[#36a3dc] hover:text-[#2b8cc4] font-semibold nav-link">Manage Services</a>
            </div>



            <!-- Reviews Block -->
            <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-transform hover:scale-[1.02] duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-[#36a3dc] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828H9v-2.828l8.586-8.586z" />
                    </svg>
                    Review Statistics
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Total Reviews</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $totalReviews }}</p>
                    </div>
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Average Rating</h3>
                        <p class="mt-2 text-4xl font-bold">{{ number_format($averageRating, 1) }}/5</p>
                    </div>
                </div>
                <a href="/admin/reviews" class="mt-6 inline-block text-[#36a3dc] hover:text-[#2b8cc4] font-semibold nav-link">Manage Reviews</a>
            </div>

                        <!-- Bookings Block -->
            <div class="bg-white rounded-2xl shadow-xl p-8 transform transition-transform hover:scale-[1.02] duration-300">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 flex items-center">
                    <svg class="w-6 h-6 text-[#36a3dc] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Booking Statistics
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gradient-to-r from-[#36a3dc] to-[#2b8cc4] rounded-xl p-6 text-white shadow-lg transform hover:-translate-y-1 transition duration-300">
                        <h3 class="text-base font-medium">Total Bookings</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $totalBookings }}</p>
                    </div>
                </div>
                <a href="/admin/bookings" class="mt-6 inline-block text-[#36a3dc] hover:text-[#2b8cc4] font-semibold nav-link">Manage Bookings</a>
            </div>
        </div>
    </div>

    <style>
        /* Animation for fade-in */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }

        /* Hover effect for nav-link */
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background: #36a3dc;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
@endsection