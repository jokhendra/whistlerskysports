<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromotionalEmail;
use Illuminate\Http\Request;

class AdminPromotionalEmailController extends Controller
{
    /**
     * Display a listing of promotional emails.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = PromotionalEmail::query();

        // Apply search filter if provided
        if ($search = $request->input('search')) {
            $query->where(function($q) use ($search) {
                $q->where('subject', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('recipient_group', 'like', "%{$search}%");
            });
        }

        // Apply status filter if provided
        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        // Apply date filters if provided
        if ($fromDate = $request->input('from_date')) {
            $query->whereDate('scheduled_at', '>=', $fromDate);
        }
        if ($toDate = $request->input('to_date')) {
            $query->whereDate('scheduled_at', '<=', $toDate);
        }

        $emails = $query->latest()->paginate(10)->withQueryString();

        // Get statistics
        $stats = [
            'total' => PromotionalEmail::count(),
            'scheduled' => PromotionalEmail::where('status', 'scheduled')->count(),
            'sent' => PromotionalEmail::where('status', 'sent')->count(),
            'draft' => PromotionalEmail::where('status', 'draft')->count(),
        ];

        return view('admin.promotional-emails.index', compact('emails', 'stats'));
    }

    /**
     * Show the form for creating a new promotional email.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.promotional-emails.form');
    }

    /**
     * Store a newly created promotional email.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'recipient_group' => 'required|string|in:all,subscribers,customers',
            'scheduled_at' => 'required|date|after:now',
            'status' => 'required|string|in:draft,scheduled'
        ]);

        PromotionalEmail::create($validated);

        return redirect()
            ->route('admin.promotional-emails.index')
            ->with('success', 'Promotional email created successfully');
    }

    /**
     * Show the specified promotional email.
     *
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\View\View
     */
    public function show(PromotionalEmail $promotionalEmail)
    {
        return view('admin.promotional-emails.show', compact('promotionalEmail'));
    }

    /**
     * Show the form for editing the specified promotional email.
     *
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\View\View
     */
    public function edit(PromotionalEmail $promotionalEmail)
    {
        return view('admin.promotional-emails.form', compact('promotionalEmail'));
    }

    /**
     * Update the specified promotional email.
     *
     * @param Request $request
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, PromotionalEmail $promotionalEmail)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'content' => 'required|string',
            'recipient_group' => 'required|string|in:all,subscribers,customers',
            'scheduled_at' => 'required|date|after:now',
            'status' => 'required|string|in:draft,scheduled'
        ]);

        $promotionalEmail->update($validated);

        return redirect()
            ->route('admin.promotional-emails.index')
            ->with('success', 'Promotional email updated successfully');
    }

    /**
     * Send a test email.
     *
     * @param Request $request
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendTest(Request $request, PromotionalEmail $promotionalEmail)
    {
        $request->validate([
            'test_email' => 'required|email'
        ]);

        // TODO: Implement email sending logic
        // Mail::to($request->test_email)->send(new PromotionalEmailMailable($promotionalEmail));

        return back()->with('success', 'Test email sent successfully');
    }

    /**
     * Send the promotional email to all recipients.
     *
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(PromotionalEmail $promotionalEmail)
    {
        // TODO: Implement bulk email sending logic
        // This should probably be handled by a queue job
        $promotionalEmail->update(['status' => 'sent', 'sent_at' => now()]);

        return back()->with('success', 'Email scheduled for sending');
    }

    /**
     * Delete the specified promotional email.
     *
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PromotionalEmail $promotionalEmail)
    {
        $promotionalEmail->delete();
        return back()->with('success', 'Promotional email deleted successfully');
    }
} 