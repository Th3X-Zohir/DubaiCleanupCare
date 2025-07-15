<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('service', 'user')->get();
        $services = Service::all();
        $users = User::all();
        Log::info('Fetching reviews for admin panel', ['reviews_count' => $reviews->count(), 'services_count' => $services->count(), 'users_count' => $users->count()]);
        return view('admin.review', compact('reviews', 'services', 'users'));
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store new review', ['request_data' => $request->all()]);
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
            'status' => 'nullable|boolean',
        ]);

        try {
            $review = Review::create([
                'service_id' => $request->service_id,
                'user_id' => $request->user_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'status' => $request->status ?? 0,
            ]);
            Log::info('Review stored successfully', ['review_id' => $review->id]);
            return response()->json(['message' => 'Review added successfully.', 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error storing review', ['error' => $e->getMessage(), 'request_data' => $request->all()]);
            return response()->json(['message' => 'An error occurred while adding the review.', 'status' => 'error'], 400);
        }
    }

    public function edit($id)
    {
        Log::info('Fetching review for edit', ['review_id' => $id]);
        $review = Review::with('service', 'user')->findOrFail($id);
        Log::info('Review data fetched', ['review' => $review->toArray()]);
        return response()->json([
            'id' => $review->id,
            'service_id' => $review->service_id,
            'user_id' => $review->user_id,
            'rating' => $review->rating,
            'comment' => $review->comment,
            'status' => $review->status,
        ]);
    }

    public function update(Request $request, $id)
    {
        Log::info('Attempting to update review', ['review_id' => $id, 'request_data' => $request->all()]);
        $review = Review::findOrFail($id);

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:1000',
            'status' => 'nullable|boolean',
        ]);

        try {
            $review->update([
                'service_id' => $request->service_id,
                'user_id' => $request->user_id,
                'rating' => $request->rating,
                'comment' => $request->comment,
                'status' => $request->status ?? $review->status,
            ]);
            Log::info('Review updated successfully', ['review_id' => $review->id]);
            return response()->json(['message' => 'Review updated successfully.', 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error updating review', ['error' => $e->getMessage(), 'request_data' => $request->all()]);
            return response()->json(['message' => 'An error occurred while updating the review.', 'status' => 'error'], 400);
        }
    }

    public function toggleStatus($id)
    {
        Log::info('Attempting to toggle review status', ['review_id' => $id]);
        $review = Review::findOrFail($id);

        try {
            $review->update([
                'status' => !$review->status,
            ]);
            Log::info('Review status toggled successfully', ['review_id' => $review->id, 'new_status' => $review->status]);
            return response()->json(['message' => 'Review status updated successfully.', 'status' => 'success', 'new_status' => $review->status]);
        } catch (\Exception $e) {
            Log::error('Error toggling review status', ['error' => $e->getMessage(), 'review_id' => $id]);
            return response()->json(['message' => 'An error occurred while updating the review status.', 'status' => 'error'], 400);
        }
    }

    public function destroy($id)
    {
        Log::info('Attempting to delete review', ['review_id' => $id]);
        $review = Review::findOrFail($id);

        try {
            $review->delete();
            Log::info('Review deleted successfully', ['review_id' => $id]);
            return response()->json(['message' => 'Review deleted successfully.', 'status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Error deleting review', ['error' => $e->getMessage(), 'review_id' => $id]);
            return response()->json(['message' => 'An error occurred while deleting the review.', 'status' => 'error'], 400);
        }
    }
}