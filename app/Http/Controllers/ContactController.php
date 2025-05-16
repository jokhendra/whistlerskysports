<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactFormMail;
use App\Mail\ContactFormConfirmationMail;
use Illuminate\Support\Facades\Validator;
use App\Models\Contact;
use App\Models\Setting;

class ContactController extends Controller
{
    /**
     * Display the contact page with settings.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key')->toArray();
        return view('contact', compact('settings'));
    }

    /**
     * Handle the contact form submission.
     * This method validates the form data, saves it to the database,
     * and sends a notification email to the business.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function contact(Request $request)
    {
        // Define validation rules for the contact form
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'consent' => 'required|accepted',
        ];

        // Validate the incoming request data
        $validator = Validator::make($request->all(), $validationRules);

        // If validation fails, redirect back with errors and input data
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Extract validated form data
        $formData = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'consent' => $request->has('consent')
        ];
        
        try {
            // Save contact form submission to database
            Contact::create($formData);
            
            // Flag to track if any emails failed
            $emailSendingFailed = false;
            
            // Get contact email from settings or use default
            $contactEmail = Setting::where('key', 'contact_email')->first();
            $recipientEmail = $contactEmail ? $contactEmail->value : config('mail.contact.address');
            
            // Try to send admin notification
            try {
                // Queue email notification
                Mail::to($recipientEmail)
                    ->queue(new ContactFormMail($formData));
            } catch (\Exception $e) {
                // Log email sending error but continue
                Log::error('Admin notification email failed: ' . $e->getMessage());
                $emailSendingFailed = true;
            }
            
            // Try to send user confirmation
            try {
                // Send confirmation email to the user
                Mail::to($formData['email'])
                    ->queue(new ContactFormConfirmationMail($formData));
            } catch (\Exception $e) {
                // Log email sending error but continue
                Log::error('User confirmation email failed: ' . $e->getMessage());
                $emailSendingFailed = true;
            }
            
            // Show appropriate success message based on email status
            if ($emailSendingFailed) {
                // Email failed but data was saved
                return redirect()->back()
                    ->with('success', 'Thank you for your message! Your information has been saved, but we encountered an issue sending confirmation emails. Our team will still review your message.');
            } else {
                // Everything succeeded
                return redirect()->back()
                    ->with('success', 'Thank you for your message! Your information has been saved and we will get back to you soon.');
            }

        } catch (\Exception $e) {
            // Log any errors that occur during form processing (not email-related)
            Log::error('Contact form submission failed: ' . $e->getMessage());
            
            // Redirect with user-friendly error message
            return redirect()->back()
                ->with('error', 'There was a problem processing your message. Please try again or contact us directly.')
                ->withInput();
        }
    }
} 