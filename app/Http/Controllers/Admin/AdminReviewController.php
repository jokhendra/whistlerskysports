<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminReviewController extends Controller
{
    /**
     * Display a listing of the reviews.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Review::query();

        // Apply search filter if provided
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('feedback', 'like', "%{$search}%");
            });
        }
        
        // Apply date filters if provided
        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('flight_date', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('flight_date', '<=', $toDate);
        }

        // Apply rating filters if provided
        if ($rating = $request->input('instructor_rating')) {
            $query->where('instructor_rating', $rating);
        }
        
        if ($rating = $request->input('fun_rating')) {
            $query->where('fun_rating', $rating);
        }
        
        if ($rating = $request->input('safety_rating')) {
            $query->where('safety_rating', $rating);
        }
        
        // Apply aircraft type filter if provided
        if ($aircraftType = $request->input('aircraft_type')) {
            $query->whereJsonContains('aircraft_type', $aircraftType);
        }

        // Apply status filter if provided
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $reviews = $query->latest()->paginate(10)->withQueryString();

        // Get statistics
        $stats = [
            'total' => Review::count(),
            'average_instructor_rating' => Review::avg('instructor_rating') ?? 0,
            'average_fun_rating' => Review::avg('fun_rating') ?? 0,
            'average_safety_rating' => Review::avg('safety_rating') ?? 0,
            'average_likelihood' => Review::avg('likelihood') ?? 0,
            'pending' => Review::where('status', 'pending')->count(),
            'today' => Review::whereDate('created_at', Carbon::today())->count(),
        ];

        return view('admin.reviews.index', compact('reviews', 'stats'));
    }

    /**
     * Show the specified review.
     *
     * @param Review $review
     * @return \Illuminate\View\View
     */
    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Update the review status.
     *
     * @param Request $request
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, Review $review)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $review->update(['status' => $request->status]);

        return back()->with('success', 'Review status updated successfully');
    }

    /**
     * Export reviews to CSV.
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export(Request $request)
    {
        $query = Review::query();

        // Apply filters
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('feedback', 'like', "%{$search}%");
            });
        }

        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('flight_date', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('flight_date', '<=', $toDate);
        }

        if ($rating = $request->input('instructor_rating')) {
            $query->where('instructor_rating', $rating);
        }
        
        if ($rating = $request->input('fun_rating')) {
            $query->where('fun_rating', $rating);
        }
        
        if ($rating = $request->input('safety_rating')) {
            $query->where('safety_rating', $rating);
        }
        
        if ($aircraftType = $request->input('aircraft_type')) {
            $query->whereJsonContains('aircraft_type', $aircraftType);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $fileName = 'reviews-' . now()->format('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $columns = [
            'ID',
            'Name',
            'Email',
            'Flight Date',
            'Aircraft Type',
            'Instructor Rating',
            'Fun Rating',
            'Safety Rating',
            'Likelihood to Return',
            'Social Media',
            'Feedback',
            'Status',
            'Created At'
        ];

        $callback = function() use ($query, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($query->latest()->get() as $review) {
                fputcsv($file, [
                    $review->id,
                    $review->name,
                    $review->email,
                    $review->flight_date->format('Y-m-d'),
                    is_array($review->aircraft_type) ? implode(', ', $review->aircraft_type) : $review->aircraft_type,
                    $review->instructor_rating,
                    $review->fun_rating,
                    $review->safety_rating,
                    $review->likelihood,
                    $review->has_social_media,
                    $review->feedback,
                    $review->status ?? 'pending',
                    $review->created_at->format('Y-m-d H:i:s')
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Delete the specified review.
     *
     * @param Review $review
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return back()->with('success', 'Review deleted successfully');
    }
} 