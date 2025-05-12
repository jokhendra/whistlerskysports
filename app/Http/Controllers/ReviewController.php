<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\Review;
use Illuminate\Http\Request;

/**
 * Class ReviewController
 * 
 * @package App\Http\Controllers
 * @description Handles the customer review functionality including displaying and storing reviews
 */
class ReviewController extends Controller
{
    /**
     * Display the review submission form.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('review');
    }

    /**
     * Store a newly created review in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     * 
     * @throws \Illuminate\Validation\ValidationException When validation fails
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'flight_date' => 'required|date',
            'aircraft_type' => 'required|array',
            'aircraft_type.*' => 'string',
            'instructor_rating' => 'required|integer|min:1|max:5',
            'fun_rating' => 'required|integer|min:1|max:5',
            'safety_rating' => 'required|integer|min:1|max:5',
            'likelihood' => 'required|integer|min:1|max:5',
            'has_social_media' => 'nullable|string|in:yes,no',
            'media_upload' => 'nullable|file|max:5120', // Max 5MB
            'feedback' => 'required|string|min:10',
        ]);

        // Handle media upload if provided
        $mediaPath = null;
        if ($request->hasFile('media_upload')) {
            $file = $request->file('media_upload');
            
            // Sanitize and create a safe filename
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '_' . substr(md5(uniqid()), 0, 8) . '.' . $extension;
            
            try {
                // Store the file in the S3 bucket without ACL
                $mediaPath = Storage::disk('s3')->putFileAs(
                    'reviews/media',
                    $file,
                    $fileName
                );
            } catch (\Exception $e) {
                // Log the error but continue without the image
                Log::error('Failed to upload media: ' . $e->getMessage());
            }
        }

        // Create new review record in database
        Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_picture' => $mediaPath,
            'flight_date' => $request->flight_date,
            'aircraft_type' => $request->aircraft_type,
            'instructor_rating' => $request->instructor_rating,
            'fun_rating' => $request->fun_rating,
            'safety_rating' => $request->safety_rating,
            'likelihood' => $request->likelihood,
            'has_social_media' => $request->has_social_media,
            'feedback' => $request->feedback,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for sharing your experience with us! Your feedback is invaluable in helping us improve our services.');
    }
} 