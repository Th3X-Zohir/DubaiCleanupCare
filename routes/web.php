<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PortfolioController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/services/{id}', [HomeController::class, 'showService'])->name('service.details');
Route::post('/services/{id}/review', [HomeController::class, 'storeReview'])->name('service.review');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/booking', [HomeController::class, 'booking'])->name('booking');
Route::post('/booking/submit', [HomeController::class, 'storeBooking'])->name('booking.submit');
Route::get('/portfolio', [HomeController::class, 'portfolio'])->name('portfolio');
Route::get('/login', [AuthenticationController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login']);

Route::get('/register', [AuthenticationController::class, 'showRegister']);
Route::post('/register', [AuthenticationController::class, 'register']);

Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');

Route::get('/dashboard', function () {
    return 'Welcome, you are logged in!';
})->middleware('auth');

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');
Route::prefix('admin/users')->middleware('auth')->group(function () {
    Route::get('/', [UserManagementController::class, 'index'])->name('admin.users');
    Route::get('/list', [UserManagementController::class, 'list']);
    Route::post('/', [UserManagementController::class, 'store']);
    Route::get('/{user}/edit', [UserManagementController::class, 'edit']);
    Route::put('/{user}', [UserManagementController::class, 'update']);
    Route::delete('/{user}', [UserManagementController::class, 'destroy']);
});

Route::prefix('admin/services')->middleware('auth')->group(function () {
    Route::get('/', [ServicesController::class, 'index'])->name('admin.services');
    Route::get('/list', [ServicesController::class, 'list']);
    Route::post('/', [ServicesController::class, 'store']);
    Route::get('/{service}/edit', [ServicesController::class, 'edit']);
    Route::put('/{service}', [ServicesController::class, 'update']);
    Route::delete('/{service}', [ServicesController::class, 'destroy']);
});

Route::prefix('admin/sliders')->middleware('auth')->group(function () {
    Route::get('/', [SliderController::class, 'index'])->name('admin.sliders.index');
    Route::get('/list', [SliderController::class, 'index']);
    Route::post('/', [SliderController::class, 'store'])->name('admin.sliders.store');
    Route::get('/{slider}/edit', [SliderController::class, 'edit'])->name('admin.sliders.edit');
    Route::put('/{slider}', [SliderController::class, 'update'])->name('admin.sliders.update');
    Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('admin.sliders.destroy');
});

Route::prefix('admin/reviews')->middleware('auth')->group(function () {
    Route::get('/', [ReviewController::class, 'index'])->name('admin.reviews');
    Route::get('/list', [ReviewController::class, 'index']);
    Route::post('/', [ReviewController::class, 'store']);
    Route::get('/{review}/edit', [ReviewController::class, 'edit'])->name('admin.reviews.edit');
    Route::put('/{review}', [ReviewController::class, 'update']);
    Route::delete('/{review}', [ReviewController::class, 'destroy']);
});
Route::post('/admin/reviews/{id}/toggle-status', [App\Http\Controllers\ReviewController::class, 'toggleStatus'])->name('admin.reviews.toggle-status');

Route::prefix('admin/bookings')->middleware('auth')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('admin.bookings');
    Route::get('/list', [BookingController::class, 'list']);
    Route::post('/', [BookingController::class, 'store']);
    Route::get('/{booking}/edit', [BookingController::class, 'edit']);
    Route::put('/{booking}', [BookingController::class, 'update']);
    Route::delete('/{booking}', [BookingController::class, 'destroy']);
});


// Admin routes for portfolio management
Route::prefix('admin/portfolios')->middleware('auth')->group(function () {
    Route::get('/', [PortfolioController::class, 'index'])->name('admin.portfolios');
    Route::get('/list', [PortfolioController::class, 'list']);
    Route::post('/', [PortfolioController::class, 'store']);
    Route::get('/{portfolio}/edit', [PortfolioController::class, 'edit']);
    Route::put('/{portfolio}', [PortfolioController::class, 'update']);
    Route::delete('/{portfolio}', [PortfolioController::class, 'destroy']);
});
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');