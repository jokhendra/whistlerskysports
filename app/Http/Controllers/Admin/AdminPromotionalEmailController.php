<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PromotionalEmail;
use App\Services\PromotionalMailService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminPromotionalEmailController extends Controller
{
    protected $promotionalMailService;

    /**
     * Constructor with dependency injection
     * 
     * @param PromotionalMailService $promotionalMailService
     */
    public function __construct(PromotionalMailService $promotionalMailService)
    {
        $this->promotionalMailService = $promotionalMailService;
    }

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
        if ($toDate = $request  ->input('to_date')) {
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

        try {
            $success = $this->promotionalMailService->sendTestEmail(
                $request->test_email,
                $promotionalEmail->subject,
                $promotionalEmail->content
            );
            
            if ($success) {
                return back()->with('success', 'Test email sent successfully to ' . $request->test_email);
            } else {
                return back()->with('error', 'Failed to send test email. Please check the logs for more details.');
            }
        } catch (\Exception $e) {
            Log::error('Error sending test email: ' . $e->getMessage());
            return back()->with('error', 'An error occurred while sending the test email: ' . $e->getMessage());
        }
    }

    /**
     * Send the promotional email to all recipients.
     *
     * @param PromotionalEmail $promotionalEmail
     * @return \Illuminate\Http\RedirectResponse
     */
    public function send(PromotionalEmail $promotionalEmail)
    {
        try {
            // If email is already sent, prevent sending again
            if ($promotionalEmail->status === 'sent') {
                return back()->with('error', 'This email has already been sent.');
            }

            // For immediate sending, get recipient emails based on group
            $recipientEmails = [];
            
            switch ($promotionalEmail->recipient_group) {
                case 'all':
                    $contactEmails = \App\Models\Contact::whereNotNull('email')->pluck('email')->toArray();
                    $bookingEmails = \App\Models\Booking::whereNotNull('email')->pluck('email')->toArray();
                    $reviewEmails = \App\Models\Review::whereNotNull('email')->pluck('email')->toArray();
                    $recipientEmails = array_unique(array_merge($contactEmails, $bookingEmails, $reviewEmails));
                    break;
                    
                case 'subscribers':
                    $recipientEmails = \App\Models\Contact::where('newsletter', true)
                        ->whereNotNull('email')
                        ->pluck('email')
                        ->toArray();
                    break;
                    
                case 'customers':
                    $recipientEmails = \App\Models\Booking::whereNotNull('email')
                        ->pluck('email')
                        ->unique()
                        ->toArray();
                    break;
            }
            
            if (empty($recipientEmails)) {
                return back()->with('error', 'No recipients found for the selected group.');
            }
            
            // Queue emails for sending
            $result = $this->promotionalMailService->queueEmailsForUsers(
                $recipientEmails,
                $promotionalEmail->subject,
                $promotionalEmail->content
            );
            
            // Update email status
            $promotionalEmail->update([
                'status' => 'sent', 
                'sent_at' => now()
            ]);
            
            // Log the result
            Log::info("Promotional email sent manually", [
                'email_id' => $promotionalEmail->id,
                'subject' => $promotionalEmail->subject,
                'recipients_count' => count($recipientEmails),
                'queued' => $result['queued'],
                'not_found' => $result['not_found']
            ]);

            return back()->with('success', "Email queued for sending to {$result['queued']} recipients.");
        } catch (\Exception $e) {
            Log::error('Error sending promotional email: ' . $e->getMessage(), [
                'email_id' => $promotionalEmail->id
            ]);
            
            return back()->with('error', 'An error occurred while sending the email: ' . $e->getMessage());
        }
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