<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PortfolioController extends Controller
{
    public function index()
    {
        $services = Service::select('id', 'title')->get();
        return view('admin.portfolio', compact('services'));
    }

    public function list()
    {
        $portfolios = Portfolio::with('service')->get();
        Log::info('Fetched portfolios for list', ['portfolios_count' => $portfolios->count()]);
        return response()->json(['portfolios' => $portfolios]);
    }

    public function store(Request $request)
    {
        Log::info('Attempting to store new portfolio', ['request_data' => $request->all()]);

        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per photo
        ]);

        if ($validator->fails()) {
            Log::warning('Portfolio validation failed', ['errors' => $validator->errors()->toArray()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $photos = [];
            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('portfolio_photos', 'public');
                    $photos[] = $path;
                }
            }

            $portfolio = Portfolio::create([
                'service_id' => $request->service_id,
                'photos' => $photos,
            ]);

            Log::info('Portfolio stored successfully', ['portfolio_id' => $portfolio->id]);
            return response()->json(['message' => 'Portfolio created successfully', 'portfolio' => $portfolio], 201);
        } catch (\Exception $e) {
            Log::error('Error storing portfolio', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'An error occurred while creating the portfolio'], 500);
        }
    }

    public function edit($id)
    {
        Log::info('Fetching portfolio for edit', ['portfolio_id' => $id]);
        $portfolio = Portfolio::with('service')->findOrFail($id);
        return response()->json($portfolio);
    }

    public function update(Request $request, $id)
    {
        Log::info('Attempting to update portfolio', ['portfolio_id' => $id, 'request_data' => $request->all()]);
        $portfolio = Portfolio::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'service_id' => 'required|exists:services,id',
            'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB per photo
        ]);

        if ($validator->fails()) {
            Log::warning('Portfolio update validation failed', ['errors' => $validator->errors()->toArray()]);
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $photos = $portfolio->photos ?? [];
            if ($request->hasFile('photos')) {
                // Delete old photos if needed
                foreach ($photos as $oldPhoto) {
                    Storage::disk('public')->delete($oldPhoto);
                }
                $photos = [];
                foreach ($request->file('photos') as $photo) {
                    $path = $photo->store('portfolio_photos', 'public');
                    $photos[] = $path;
                }
            }

            $portfolio->update([
                'service_id' => $request->service_id,
                'photos' => $photos,
            ]);

            Log::info('Portfolio updated successfully', ['portfolio_id' => $portfolio->id]);
            return response()->json(['message' => 'Portfolio updated successfully', 'portfolio' => $portfolio]);
        } catch (\Exception $e) {
            Log::error('Error updating portfolio', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'An error occurred while updating the portfolio'], 500);
        }
    }

    public function destroy($id)
    {
        Log::info('Attempting to delete portfolio', ['portfolio_id' => $id]);
        $portfolio = Portfolio::findOrFail($id);

        try {
            if ($portfolio->photos) {
                foreach ($portfolio->photos as $photo) {
                    Storage::disk('public')->delete($photo);
                }
            }
            $portfolio->delete();
            Log::info('Portfolio deleted successfully', ['portfolio_id' => $id]);
            return response()->json(['message' => 'Portfolio deleted successfully']);
        } catch (\Exception $e) {
            Log::error('Error deleting portfolio', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'An error occurred while deleting the portfolio'], 500);
        }
    }
}