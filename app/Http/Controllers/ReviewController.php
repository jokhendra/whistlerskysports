<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    public function index()
    {
        return view('review');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'profile_picture' => 'nullable|image|max:2048', // Max 2MB
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|min:10',
        ]);

        $profilePicturePath = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile-pictures', 'public');
        }

        Review::create([
            'name' => $request->name,
            'email' => $request->email,
            'profile_picture' => $profilePicturePath,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        return redirect()->back()->with('success', 'Thank you for your review!');
    }
} 