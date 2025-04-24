<?php

namespace App\Jobs;

use App\Models\Booking;
use App\Mail\BookingConfirmation;
use App\Services\GoogleService;
use App\Notifications\BookingProcessFailedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ProcessBookingConfirmation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $booking;
    public $tries = 3;
    public $maxExceptions = 3;
    public $backoff = [10, 60, 180];

    /**
     * Create a new job instance.
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Starting booking confirmation process', ['booking_id' => $this->booking->id]);

        $errors = [];

        // Send confirmation email
        $this->sendConfirmationEmail($errors);

        // Update Google services
        $this->updateGoogleServices($errors);

        // If there were any errors, log them but don't fail the job
        if (!empty($errors)) {
            Log::warning('Booking process completed with some errors', [
                'booking_id' => $this->booking->id,
                'errors' => $errors
            ]);

            // Notify admin about partial failures
            $this->notifyAdminOfPartialFailure($errors);
        } else {
            Log::info('Booking process completed successfully', [
                'booking_id' => $this->booking->id
            ]);
        }
    }

    /**
     * Send the confirmation email
     */
    private function sendConfirmationEmail(array &$errors): void
    {
        try {
            Mail::to($this->booking->email)->send(new BookingConfirmation($this->booking));
            Log::info('Confirmation email sent successfully', ['booking_id' => $this->booking->id]);
        } catch (\Exception $e) {
            $errors['email'] = $e->getMessage();
            Log::error('Failed to send confirmation email', [
                'booking_id' => $this->booking->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Update Google Calendar and Sheets
     */
    private function updateGoogleServices(array &$errors): void
    {
        try {
            $googleService = new GoogleService();
            
            // Try to add to Google Calendar
            try {
                $calendarEventId = $googleService->addBookingToCalendar($this->booking);
                if ($calendarEventId) {
                    Log::info('Added to Google Calendar', [
                        'booking_id' => $this->booking->id,
                        'event_id' => $calendarEventId
                    ]);
                }
            } catch (\Exception $e) {
                $errors['google_calendar'] = $e->getMessage();
                Log::error('Failed to add to Google Calendar', [
                    'booking_id' => $this->booking->id,
                    'error' => $e->getMessage()
                ]);
            }

            // Try to add to Google Sheets
            try {
                $sheetsResult = $googleService->addBookingToSheet($this->booking);
                if ($sheetsResult) {
                    Log::info('Added to Google Sheets', ['booking_id' => $this->booking->id]);
                }
            } catch (\Exception $e) {
                $errors['google_sheets'] = $e->getMessage();
                Log::error('Failed to add to Google Sheets', [
                    'booking_id' => $this->booking->id,
                    'error' => $e->getMessage()
                ]);
            }
        } catch (\Exception $e) {
            $errors['google_service'] = $e->getMessage();
            Log::error('Failed to initialize Google services', [
                'booking_id' => $this->booking->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Notify admin about partial failures
     */
    private function notifyAdminOfPartialFailure(array $errors): void
    {
        try {
            $errorMessage = "The following operations failed:\n";
            foreach ($errors as $service => $error) {
                $errorMessage .= "- {$service}: {$error}\n";
            }

            Notification::route('mail', config('mail.admin_email'))
                ->notify(new BookingProcessFailedNotification($this->booking, $errorMessage));
        } catch (\Exception $e) {
            Log::error('Failed to send admin notification', [
                'booking_id' => $this->booking->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Handle a complete job failure.
     */
    public function failed(\Throwable $exception): void
    {
        Log::error('Booking confirmation process failed completely', [
            'booking_id' => $this->booking->id,
            'error' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString()
        ]);

        try {
            Notification::route('mail', config('mail.admin_email'))
                ->notify(new BookingProcessFailedNotification(
                    $this->booking,
                    "Complete process failure: " . $exception->getMessage()
                ));
        } catch (\Exception $e) {
            Log::error('Failed to send failure notification', [
                'booking_id' => $this->booking->id,
                'error' => $e->getMessage()
            ]);
        }
    }
} 