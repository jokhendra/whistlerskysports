<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

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
                  ->orWhere('review', 'like', "%{$search}%");
            });
        }
        
        // Apply date filters if provided
        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        // Apply rating filter if provided
        if ($rating = $request->input('rating')) {
            $query->where('rating', $rating);
        }

        // Apply status filter if provided
        // if ($status = $request->input('status')) {
        //     $query->where('status', $status);
        // }

        $reviews = $query->latest()->paginate(10)->withQueryString();

        // Get statistics
        $stats = [
            'total' => Review::count(),
            'average_rating' => Review::avg('rating'),
            // 'pending' => Review::where('status', 'pending')->count(),
            'pending' => 0,
            'today' => Review::whereDate('created_at', today())->count(),
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
                  ->orWhere('review', 'like', "%{$search}%");
            });
        }

        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        if ($rating = $request->input('rating')) {
            $query->where('rating', $rating);
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
            'Rating',
            'Review',
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
                    $review->rating,
                    $review->review,
                    $review->status,
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