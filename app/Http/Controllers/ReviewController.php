<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'profile_picture' => 'nullable|image|max:2048', // Max 2MB
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|min:10',
        ]);

        // Handle profile picture upload if provided
        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        // Create new review record in database
        Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_picture' => $profilePicturePath,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Thank you for your review!');
    }
} 