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
        // Log all request inputs for debugging
       
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
            'media_upload' => 'nullable|file|max:10240|mimes:jpeg,jpg,png,gif,mp4,mov,avi', // Max 10MB, common image and video formats
            'feedback' => 'nullable|string|min:10',
        ]);
        
        if ($request->hasFile('media_upload')) {
            Log::info('File is valid: ' . ($request->file('media_upload')->isValid() ? 'YES' : 'NO'));
            Log::info('File details: ' . json_encode([
                'name' => $request->file('media_upload')->getClientOriginalName(),
                'extension' => $request->file('media_upload')->getClientOriginalExtension(),
                'mime' => $request->file('media_upload')->getMimeType(),
                'size' => $request->file('media_upload')->getSize()
            ]));
        }

        // Handle media upload if provided
        $mediaPath = null;
        if ($request->hasFile('media_upload') && $request->file('media_upload')->isValid()) {
            $file = $request->file('media_upload');
            
            // Determine file type (image or video)
            $fileType = explode('/', $file->getMimeType())[0]; // 'image' or 'video'
            
            // Sanitize and create a safe filename
            $extension = $file->getClientOriginalExtension();
            $fileName = 'review_' . time() . '_' . substr(md5(uniqid()), 0, 8) . '.' . $extension;
            
            // Create the directories if they don't exist
            $directory = 'reviews/' . $fileType . 's';
            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
                Log::info('Created directory: ' . $directory);
            }
            
            try {
                // First try S3 storage
                try {
                    // Store the file in the S3 bucket
                    $mediaPath = Storage::disk('s3')->putFileAs(
                        $directory,
                        $file,
                        $fileName
                    );
                    
                    // Log successful upload
                    Log::info('Media uploaded successfully to S3 for review: ' . $mediaPath);
                } catch (\Exception $e) {
                    // Log the error but continue to local storage
                    Log::error('Failed to upload media to S3: ' . $e->getMessage());
                    throw $e; // Re-throw to move to local storage
                }
            } catch (\Exception $e) {
                // Use local storage
                try {
                    $localPath = Storage::disk('public')->putFileAs(
                        $directory,
                        $file,
                        $fileName
                    );
                    $mediaPath = 'local/' . $directory . '/' . $fileName;
                    Log::info('Media saved to local storage: ' . $mediaPath);
                } catch (\Exception $localError) {
                    Log::error('Failed to save media locally: ' . $localError->getMessage());
                }
            }
        } else {
            if (array_key_exists('media_upload', $request->all())) {
                Log::info('Media upload exists in request but is not a valid file');
            } else {
                Log::info('No media upload provided in the request');
            }
        }

        // Calculate average rating from other ratings
        $avgRating = round(($request->instructor_rating + $request->fun_rating + $request->safety_rating) / 3);

        // Create new review record in database
        $review = Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_picture' => null, // Legacy field, set to null
            'media_upload' => $mediaPath, // Path to the uploaded file in S3 or local storage
            'flight_date' => $request->flight_date,
            'aircraft_type' => $request->aircraft_type,
            'instructor_rating' => $request->instructor_rating,
            'fun_rating' => $request->fun_rating,
            'safety_rating' => $request->safety_rating,
            'likelihood' => $request->likelihood,
            'has_social_media' => $request->has_social_media,
            'feedback' => $request->feedback,
            'rating' => $avgRating, // Set the average rating
            'status' => 'pending', // Default status for new reviews
        ]);

        // Log the successful creation of the review
        Log::info('Review created successfully. ID: ' . $review->id);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for sharing your experience with us! Your feedback is invaluable in helping us improve our services.');
    }
} 