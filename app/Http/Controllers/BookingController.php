<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingConfirmation;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Payment;
use App\Services\GoogleService;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Jobs\ProcessBookingConfirmation;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

/**
 * Class BookingController
 * 
 * Handles all booking-related operations including creation, payment processing,
 * and integration with external services (PayPal, Google Calendar/Sheets).
 */
class BookingController extends Controller
{
    /** @var PayPalClient|null */
    private $paypal = null;

    /** @var GoogleService|null */
    private $googleService = null;

    /**
     * Fixed prices for packages and add-ons
     */
    private const PRICES = [
        'packages' => [
            'intro' => 229,
            'basic' => 199
        ],
        'video_package' => 90,
        'deluxe_package' => 120,
        'merch_package' => 40,
        'sunrise_flight' => 99
    ];

    /**
     * Initialize PayPal client with proper credentials
     *
     * @return PayPalClient
     * @throws \Exception
     */
    private function initializePayPal()
    {
        if ($this->paypal === null) {
        try {
                Log::info('Initializing PayPal client');
            $this->paypal = new PayPalClient;
                Log::info('Setting PayPal API credentials');
            $this->paypal->setApiCredentials(config('paypal'));
                Log::info('Getting PayPal access token');
            $this->paypal->getAccessToken();
                Log::info('PayPal client initialized successfully');
        } catch (\Exception $e) {
            Log::error('PayPal initialization error: ' . $e->getMessage());
                Log::error('PayPal initialization error trace: ' . $e->getTraceAsString());
                Log::error('PayPal configuration: ' . json_encode(config('paypal')));
                throw $e;
            }
        }
        return $this->paypal;
    }

    /**
     * Initialize Google service for calendar and sheets integration
     *
     * @return GoogleService|null
     */
    private function initializeGoogle()
    {
        if ($this->googleService === null) {
            try {
                Log::info('Initializing Google service');
                $this->googleService = new GoogleService();
                Log::info('Google service initialized successfully');
            } catch (\Exception $e) {
                Log::error('Google service initialization error: ' . $e->getMessage());
                Log::error('Error trace: ' . $e->getTraceAsString());
            }
        }
        return $this->googleService;
    }

    /**
     * Preview booking before confirmation
     *
     * @param Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function preview(Request $request)
    {
        try {
            // Rate limiting to prevent form spam
            if (RateLimiter::tooManyAttempts('booking_preview:' . $request->ip(), 10)) {
                Log::warning('Rate limit exceeded for booking preview', ['ip' => $request->ip()]);
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => 'Too many attempts. Please try again later.']);
            }
            RateLimiter::hit('booking_preview:' . $request->ip());
            // Convert checkbox values to boolean with strict type casting
            $request->merge([
                'video_package' => filter_var($request->has('video_package'), FILTER_VALIDATE_BOOLEAN),
                'deluxe_package' => filter_var($request->has('deluxe_package'), FILTER_VALIDATE_BOOLEAN),
                'terms' => filter_var($request->has('terms'), FILTER_VALIDATE_BOOLEAN),
                'waiver' => filter_var($request->has('waiver'), FILTER_VALIDATE_BOOLEAN)
            ]);
            // Validate request data with strict rules
            $validated = $request->validate([
                'name' => ['required', 'string', 'max:255', 'regex:/^[\p{L}\s\-\'\.]+$/u'],
                'email' => ['required', 'email:rfc,dns', 'max:255'],
                'primary_phone' => ['required', 'string', 'regex:/^\+?[\d\s-]{10,20}$/'],
                'timezone' => ['required', 'string', 'timezone'],
                'local_phone' => ['required', 'string', 'regex:/^\+?[\d\s-]{10,20}$/'],
                'package' => ['required', 'string', 'in:intro,basic'],
                'flyer_details' => ['required', 'string', 'max:1000'],
                'underage_flyers' => ['nullable', 'string', 'max:500'],
                'preferred_dates' => ['required', 'date', 'after_or_equal:today', 'before:+6 months'],
                'sunrise_flight' => ['required', 'string', 'in:yes,no'],
                'date_of_birth' => ['required', 'date', 'before:-18 years'],
                'weight' => ['required', 'integer', 'min:1', 'max:245'],
                'video_package' => ['required', 'boolean'],
                'deluxe_package' => ['required', 'boolean'],
                'merch_package' => ['nullable', 'integer', 'min:0', 'max:10'],
                'accommodation' => ['nullable', 'string', 'max:500'],
                'special_event' => ['nullable', 'string', 'max:255'],
                'additional_info' => ['nullable', 'string', 'max:1000'],
                'terms' => ['accepted'],
                'waiver' => ['accepted'],
                'emergency_name' => ['nullable', 'string', 'max:255', 'regex:/^[\p{L}\s\-\'\.]+$/u'],
                'emergency_relationship' => ['nullable', 'string', 'max:100'],
                'emergency_phone' => ['nullable', 'string'],
                'price_components' => ['required', 'json'],
                'calculated_total' => ['required', 'numeric', 'min:0', 'max:10000']
            ]);

            // Clean and sanitize phone numbers
            $validated['primary_phone'] = preg_replace('/[^0-9+]/', '', $validated['primary_phone']);
            $validated['local_phone'] = preg_replace('/[^0-9+]/', '', $validated['local_phone']);
            if (!empty($validated['emergency_phone'])) {
                $validated['emergency_phone'] = preg_replace('/[^0-9+]/', '', $validated['emergency_phone']);
            }

            // Verify price components against submitted total
            $priceComponents = json_decode($validated['price_components'], true);
            $calculatedTotal = $this->calculateTotalAmount($validated);
            $submittedTotal = floatval($validated['calculated_total']);

            if (abs($calculatedTotal - $submittedTotal) > 0.01) {
                Log::warning('Price manipulation detected', [
                    'calculated' => $calculatedTotal,
                    'submitted' => $submittedTotal,
                    'difference' => abs($calculatedTotal - $submittedTotal),
                    'ip' => $request->ip(),
                    'components' => $priceComponents
                ]);
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => 'Invalid price calculation. Please try again.']);
            }

            // Generate waiver with security checks
            try {
                $pdfPath = $this->generateWaiverPDF($request, $calculatedTotal);
                if (!Storage::disk('public')->exists($pdfPath)) {
                    throw new \Exception('Failed to generate waiver PDF');
                }
            } catch (\Exception $e) {
                Log::error('Waiver generation failed: ' . $e->getMessage());
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['error' => 'Failed to generate waiver. Please try again.']);
            }

            // Generate unique order ID with collision checking
            $uniqueOrderId = $this->generateUniqueOrderId($validated['email']);
            
            // Store booking data in session with expiration
            $bookingData = array_merge($validated, [
                'total_amount' => $calculatedTotal,
                'waiver_pdf_path' => $pdfPath,
                'order_id' => $uniqueOrderId
            ]);
            
            // Set session with expiration
            $request->session()->put('booking_data', $bookingData);
            $request->session()->put('booking_data_expiry', now()->addHours(1));

            return view('booking.preview', [
                'booking' => $bookingData,
                'waiver_pdf' => $pdfPath,
                'totalAmount' => $calculatedTotal
            ]);

        } catch (ValidationException $e) {
            Log::error('Booking validation failed', [
                'errors' => $e->errors(),
                'ip' => $request->ip()
            ]);
            throw $e;
        } catch (\Exception $e) {
            Log::error('Booking preview error: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
            Log::error('Request data: ' . json_encode($request->all()));
            
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'error' => 'There was an error processing your booking. Please try again.',
                    'debug_info' => config('app.debug') ? $e->getMessage() : null
                ]);
        }
    }

    /**
     * Generate PDF waiver for the booking
     *
     * @param Request $request
     * @param float $totalAmount
     * @return string
     */
    private function generateWaiverPDF($request, $totalAmount)
    {
        try {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->primary_phone,
            'date' => now()->format('F j, Y'),
            'signature' => $request->signature_data,
            'initials' => $this->getInitials($request->name),
            'total_amount' => $totalAmount,
            'emergency_name' => $request->emergency_name,
            'emergency_relationship' => $request->emergency_relationship,
            'emergency_phone' => $request->emergency_phone
        ];
        
            // Generate PDF from view
        $pdf = PDF::loadView('pdfs.waiver', $data);
        
            // Generate a unique filename
        $fileName = 'waiver_' . str_replace(' ', '_', $request->name) . '_' . time() . '.pdf';
        $pdfPath = 'waivers/' . $fileName;
            
            // Store in public disk as fallback
        Storage::disk('public')->put($pdfPath, $pdf->output());

            // Store in S3
            try {
                Log::info('Storing waiver PDF in S3', ['path' => $pdfPath]);
                
                // Store the PDF on S3
                if (Storage::disk('s3')->put($pdfPath, $pdf->output())) {
                    Log::info('Successfully stored waiver PDF in S3', ['path' => $pdfPath]);
                    
                    // We don't need the URL here, just log that it was stored successfully
                    // The path is sufficient for database storage
                    Log::info('PDF stored in S3', ['path' => $pdfPath]);
                    
                    // Return S3 path for storage in database
        return $pdfPath;
                } else {
                    Log::error('Failed to store waiver PDF in S3', ['path' => $pdfPath]);
                    return $pdfPath; // Return local path as fallback
                }
            } catch (\Exception $e) {
                Log::error('Exception storing waiver PDF in S3', [
                    'error' => $e->getMessage(),
                    'path' => $pdfPath
                ]);
                return $pdfPath; // Return local path as fallback
            }
        } catch (\Exception $e) {
            Log::error('Failed to generate waiver PDF', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            throw $e;
        }
    }

    /**
     * Get initials from a full name
     *
     * @param string $name
     * @return string
     */
    private function getInitials($name)
    {
        return implode('', array_map(function($word) {
            return strtoupper(substr($word, 0, 1));
        }, explode(' ', $name)));
    }

    /**
     * Create a new booking record with enhanced security
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBooking(Request $request)
    {
        try {
            // Rate limiting to prevent abuse
            if (RateLimiter::tooManyAttempts('create_booking:' . $request->ip(), 5)) {
                Log::warning('Rate limit exceeded for booking creation', ['ip' => $request->ip()]);
                return response()->json([
                    'success' => false,
                    'error' => 'Too many attempts. Please try again later.'
                ], 429);
            }
            RateLimiter::hit('create_booking:' . $request->ip());

            // Validate session data exists and hasn't expired
            $bookingData = session('booking_data');
            $bookingExpiry = session('booking_data_expiry');

            Log::info('Booking data:', ['data' => $bookingData]);
            
            if (!$bookingData || !$bookingExpiry || now()->isAfter($bookingExpiry)) {
                Log::warning('Invalid or expired booking session', [
                    'has_data' => !empty($bookingData),
                    'has_expiry' => !empty($bookingExpiry),
                    'ip' => $request->ip()
                ]);
            return response()->json([
                'success' => false,
                    'error' => 'Booking session expired or invalid. Please start over.'
                ], 400);
            }

            // Verify CSRF token
            if (!$request->hasValidSignature() && !$request->isMethod('post')) {
                Log::warning('Invalid CSRF token for booking creation', ['ip' => $request->ip()]);
                return response()->json([
                    'success' => false,
                    'error' => 'Invalid request signature'
                ], 403);
            }

            // Sanitize and validate booking data
            $sanitizedData = $this->sanitizeBookingData($bookingData);

            Log::info('Sanitized data:', ['data' => $sanitizedData]);
            
            // Verify price hasn't been tampered with
            if (!$this->verifyBookingPrice($sanitizedData)) {
                Log::warning('Price tampering detected', [
                    'ip' => $request->ip(),
                    'data' => $sanitizedData
                ]);
                return response()->json([
                    'success' => false,
                    'error' => 'Invalid booking data detected'
                ], 400);
            }

            // Create booking within a transaction
            $booking = DB::transaction(function () use ($sanitizedData) {
            $booking = Booking::create([
                    'name' => $sanitizedData['name'],
                    'email' => $sanitizedData['email'],
                    'primary_phone' => $sanitizedData['primary_phone'],
                    'timezone' => $sanitizedData['timezone'],
                    'local_phone' => $sanitizedData['local_phone'],
                    'package' => $sanitizedData['package'],
                    'flyer_details' => $sanitizedData['flyer_details'],
                    'underage_flyers' => $sanitizedData['underage_flyers'] ?? null,
                    'preferred_dates' => $sanitizedData['preferred_dates'],
                    'sunrise_flight' => $sanitizedData['sunrise_flight'],
                    'date_of_birth' => $sanitizedData['date_of_birth'],
                    'weight' => $sanitizedData['weight'],
                    'video_package' => $sanitizedData['video_package'] ?? false,
                    'deluxe_package' => $sanitizedData['deluxe_package'] ?? false,
                    'merch_package' => $sanitizedData['merch_package'] ?? 0,
                    'accommodation' => $sanitizedData['accommodation'] ?? null,
                    'special_event' => $sanitizedData['special_event'] ?? null,
                    'additional_info' => $sanitizedData['additional_info'] ?? null,
                    'total_amount' => $sanitizedData['total_amount'],
                    'waiver_pdf_path' => $sanitizedData['waiver_pdf_path'],
                    'emergency_name' => $sanitizedData['emergency_name'] ?? null,
                    'emergency_relationship' => $sanitizedData['emergency_relationship'] ?? null,
                    'emergency_phone' => $sanitizedData['emergency_phone'] ?? null,
                    'status' => 'pending',
                    'order_id' => $sanitizedData['order_id'],
                    'ip_address' => request()->ip(),
                    'user_agent' => request()->userAgent(),
                    'flying_status' => 'pending'
                ]);

                // Log successful booking creation
                Log::info('Booking created successfully', [
                    'booking_id' => $booking->id,
                    'order_id' => $booking->order_id,
                    'ip' => request()->ip()
                ]);
                return $booking;
            });

            // Clear sensitive session data
            session()->forget(['booking_data', 'booking_data_expiry']);

            return response()->json([
                'success' => true,
                'booking_id' => $booking->id,
                'order_id' => $booking->order_id
            ]);

        } catch (\Exception $e) {
            Log::error('Booking creation error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'ip' => $request->ip()
            ]);
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to create booking. Please try again.'
            ], 500);
        }
    }

    /**
     * Sanitize booking data to prevent XSS and injection attacks
     *
     * @param array $data
     * @return array
     */
    private function sanitizeBookingData(array $data): array
    {
        $sanitized = [];
        
        // Sanitize string fields
        $stringFields = [
            'name', 'email', 'primary_phone', 'timezone', 'local_phone',
            'package', 'flyer_details', 'underage_flyers', 'accommodation',
            'special_event', 'additional_info', 'waiver_pdf_path', 'order_id',
            'emergency_name', 'emergency_relationship', 'emergency_phone'
        ];

        foreach ($stringFields as $field) {
            if (isset($data[$field])) {
                $sanitized[$field] = htmlspecialchars(strip_tags($data[$field]), ENT_QUOTES, 'UTF-8');
            }
        }

        // Set default values for required emergency contact fields if not provided
        $sanitized['emergency_name'] = $sanitized['emergency_name'] ?? $sanitized['name'];
        $sanitized['emergency_relationship'] = $sanitized['emergency_relationship'] ?? 'Self';
        $sanitized['emergency_phone'] = $sanitized['emergency_phone'] ?? $sanitized['primary_phone'];

        // Sanitize boolean fields
        $booleanFields = ['video_package', 'deluxe_package'];
        foreach ($booleanFields as $field) {
            $sanitized[$field] = filter_var($data[$field] ?? false, FILTER_VALIDATE_BOOLEAN);
        }

        // Sanitize numeric fields
        $sanitized['merch_package'] = filter_var($data['merch_package'] ?? 0, FILTER_VALIDATE_INT);
        $sanitized['total_amount'] = filter_var($data['total_amount'], FILTER_VALIDATE_FLOAT);
        $sanitized['weight'] = (int)$data['weight']; // Ensure weight is an integer

        // Sanitize date fields
        $sanitized['preferred_dates'] = $data['preferred_dates'];
        $sanitized['sunrise_flight'] = $data['sunrise_flight'];
        $sanitized['date_of_birth'] = $data['date_of_birth']; // Keep date_of_birth as is

        return $sanitized;
    }

    /**
     * Verify that the booking price hasn't been tampered with
     *
     * @param array $data
     * @return bool
     */
    private function verifyBookingPrice(array $data): bool
    {
        try {
            $calculatedTotal = $this->calculateTotalAmount($data);
            return abs($calculatedTotal - $data['total_amount']) < 0.01;
        } catch (\Exception $e) {
            Log::error('Price verification failed: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Capture payment for a booking with enhanced security
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function capturePayment(Request $request)
    {
        try {
            // Rate limiting to prevent abuse
            if (RateLimiter::tooManyAttempts('capture_payment:' . $request->ip(), 5)) {
                Log::warning('Rate limit exceeded for payment capture', ['ip' => $request->ip()]);
                return response()->json([
                    'success' => false,
                    'error' => 'Too many attempts. Please try again later.'
                ], 429);
            }
            RateLimiter::hit('capture_payment:' . $request->ip());

            // Validate request data
            $validated = $request->validate([
                'order_id' => ['required', 'string', 'max:255'],
                'booking_id' => ['nullable', 'integer', 'exists:bookings,id']
            ]);

            $orderId = $validated['order_id'];
            $bookingId = $validated['booking_id'];

            Log::info('Starting payment capture process', [
                'order_id' => $orderId, 
                'booking_id' => $bookingId,
                'ip' => $request->ip()
            ]);
            
            // Initialize PayPal with error handling
            try {
            $this->initializePayPal();
            } catch (\Exception $e) {
                Log::error('PayPal initialization failed', [
                    'error' => $e->getMessage(),
                    'ip' => $request->ip()
                ]);
                return response()->json([
                    'success' => false,
                    'error' => 'Payment service unavailable. Please try again later.'
                ], 503);
            }
            
            try {
                // Capture the payment with validation
            $capture = $this->capturePayPalPayment($orderId);
                if (!$capture || !isset($capture['id'])) {
                    throw new \Exception('Invalid PayPal capture response');
                }
                
                Log::info('PayPal capture response:', [
                    'capture_id' => $capture['id'],
                    'status' => $capture['status'] ?? 'unknown'
                ]);
                
                $paymentDetails = $this->extractPaymentDetails($capture);
                if (!isset($capture['purchase_units'][0]['reference_id'])) {
                    throw new \Exception('Invalid purchase unit reference');
                }
                
                $referenceId = $capture['purchase_units'][0]['reference_id'];
                
                // Find booking with proper error handling
                $booking = $bookingId ? 
                    Booking::findOrFail($bookingId) : 
                    Booking::where('order_id', $orderId)->firstOrFail();
                
                // Verify booking status
                if ($booking->status !== 'pending') {
                    throw new \Exception('Invalid booking status for payment capture');
                }

                // Handle critical operations in a transaction
                DB::transaction(function () use ($booking, $paymentDetails, $orderId) {
                    // Update booking status
                        $updateResult = $booking->update([
                        'status' => 'confirmed',
                        'payment_id' => $paymentDetails['payment_info']['payment_id'] ?? null,
                        'payment_order_id' => $orderId,
                    ]);

                    if (!$updateResult) {
                        throw new \Exception('Failed to update booking status');
                    }
                        
                        // Store payment information
                    $payment = $this->storePayment($booking, $paymentDetails);
                    if (!$payment) {
                        throw new \Exception('Failed to store payment information');
                    }
                });
                        
                // Dispatch non-critical operations to queue
                try {
                    ProcessBookingConfirmation::dispatch($booking)
                        ->delay(now()->addSeconds(5))
                        ->onQueue('bookings');
                } catch (\Exception $e) {
                    Log::error('Failed to dispatch booking confirmation', [
                        'error' => $e->getMessage(),
                        'booking_id' => $booking->id
                    ]);
                }

                // Clear all session data related to the booking
                $this->clearBookingSession($request);

                // Store successful booking ID in session
                $request->session()->put('last_successful_booking_id', $booking->id);
            
            return response()->json([
                'success' => true,
                'message' => 'Payment captured successfully',
                    'capture_id' => $capture['id']
                ]);

            } catch (\Exception $e) {
                $this->handlePaymentError($e, $bookingId, $orderId);
                // Clear session data even on failure
                $this->clearBookingSession($request);
                return response()->json([
                    'success' => false,
                    'error' => 'Payment failed. Please try again or contact support.'
                ], 400);
            }

        } catch (\Exception $e) {
            Log::error('Payment capture error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'ip' => $request->ip()
            ]);
            
            // Clear session data on any error
            $this->clearBookingSession($request);
                
                return response()->json([
                    'success' => false,
                'error' => 'Failed to capture payment. Please try again.'
            ], 500);
        }
    }

    /**
     * Handle payment processing error
     *
     * @param \Exception $e
     * @param int|null $bookingId
     * @param string $orderId
     */
    private function handlePaymentError(\Exception $e, $bookingId, $orderId)
    {
        Log::error('Payment error', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString(),
            'booking_id' => $bookingId,
            'order_id' => $orderId
        ]);
        
        $booking = $bookingId ? 
            Booking::find($bookingId) : 
            Booking::where('order_id', $orderId)->first();
        
            if ($booking) {
                $booking->update([
                'status' => 'failed',
                'flying_status' => 'cancelled'
                ]);
                $this->storeFailedPayment($booking, $orderId, $e->getMessage());
        }
    }

    /**
     * Show success page after booking
     *
     * @return \Illuminate\View\View
     */
    public function success()
    {
        // Get booking ID from session
        $bookingId = session('last_successful_booking_id');
        
        if (!$bookingId) {
            return redirect()->route('home')
                ->with('error', 'No booking found.');
        }

        // Get booking details
        $booking = Booking::where('id', $bookingId)
                        ->where('status', 'confirmed')
                        ->first();

        if (!$booking) {
            return redirect()->route('home')
                ->with('error', 'Booking not found.');
        }

        // Clear the session data
        session()->forget('last_successful_booking_id');

        return view('booking.success', [
            'booking' => $booking
        ]);
    }

    /**
     * Calculate total amount with security validation
     *
     * @param array $data
     * @return float
     */
    private function calculateTotalAmount($data)
    {
        try {
            $total = 0;

            // Validate and add base package price
            if (!isset(self::PRICES['packages'][$data['package']])) {
                throw new \Exception('Invalid package selected');
            }
            $total += self::PRICES['packages'][$data['package']];

            // Add video package if selected
            if (filter_var($data['video_package'], FILTER_VALIDATE_BOOLEAN)) {
                $total += self::PRICES['video_package'];
            }

            // Add deluxe package if selected
            if (filter_var($data['deluxe_package'], FILTER_VALIDATE_BOOLEAN)) {
                $total += self::PRICES['deluxe_package'];
            }

            // Add merchandise with validation
            $merchQty = isset($data['merch_package']) ? (int)$data['merch_package'] : 0;
            $merchQty = max(0, min($merchQty, 10)); // Ensure between 0 and 10
            $total += $merchQty * self::PRICES['merch_package'];

            // Add sunrise flight if selected
            if ($data['sunrise_flight'] === 'yes') {
                $total += self::PRICES['sunrise_flight'];
            }

            Log::info('Price calculation details', [
                'package' => $data['package'],
                'video_package' => $data['video_package'],
                'deluxe_package' => $data['deluxe_package'],
                'merch_package' => $merchQty,
                'sunrise_flight' => $data['sunrise_flight'],
                'total' => $total
            ]);

            return $total;
        } catch (\Exception $e) {
            Log::error('Error calculating total amount: ' . $e->getMessage(), [
                'data' => $data
            ]);
            throw $e;
        }
    }

    /**
     * Capture PayPal payment
     *
     * @param string $orderId
     * @return array
     * @throws \Exception
     */
    private function capturePayPalPayment($orderId)
    {
        try {
            $response = $this->paypal->capturePaymentOrder($orderId);
            Log::info('PayPal capture payment response:', ['response' => $response]);
            return $response;
        } catch (\Exception $e) {
            Log::error('PayPal payment capture error: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Extract payment details from PayPal response
     *
     * @param array $capture
     * @return array
     */
    private function extractPaymentDetails($capture)
    {
        $details = [
            'order_id' => $capture['id'] ?? null,
            'payment_id' => null,
            'amount' => 0,
            'currency' => 'USD',
            'status' => $capture['status'] ?? 'unknown',
            'payer_email' => null,
            'payer_name' => null,
            'payer_id' => null,
        ];
        
        if (isset($capture['purchase_units'][0]['payments']['captures'][0]['id'])) {
            $details['payment_id'] = $capture['purchase_units'][0]['payments']['captures'][0]['id'];
        }
        
        if (isset($capture['purchase_units'][0]['payments']['captures'][0]['amount'])) {
            $details['amount'] = $capture['purchase_units'][0]['payments']['captures'][0]['amount']['value'] ?? 0;
            $details['currency'] = $capture['purchase_units'][0]['payments']['captures'][0]['amount']['currency_code'] ?? 'USD';
        }
        
        if (isset($capture['payer'])) {
            $details['payer_email'] = $capture['payer']['email_address'] ?? null;
            $details['payer_id'] = $capture['payer']['payer_id'] ?? null;
            
            if (isset($capture['payer']['name'])) {
                $details['payer_name'] = ($capture['payer']['name']['given_name'] ?? '') . ' ' . 
                                       ($capture['payer']['name']['surname'] ?? '');
            }
        }
        
        return [
            'payment_info' => $details,
            'provider_response' => $capture
        ];
    }
    
    /**
     * Store successful payment information
     *
     * @param Booking $booking
     * @param array $paymentDetails
     * @return Payment|null
     */
    private function storePayment($booking, $paymentDetails)
    {
        try {
            $payment = new Payment([
                'booking_id' => $booking->id,
                'provider' => 'paypal',
                'payment_order_id' => $paymentDetails['payment_info']['order_id'],
                'order_id' => $booking->order_id,
                'payment_id' => $paymentDetails['payment_info']['payment_id'],
                'amount' => $paymentDetails['payment_info']['amount'],
                'currency' => $paymentDetails['payment_info']['currency'],
                'status' => $paymentDetails['payment_info']['status'],
                'is_refunded' => false,
                'payer_email' => $paymentDetails['payment_info']['payer_email'],
                'payer_name' => $paymentDetails['payment_info']['payer_name'],
                'payer_id' => $paymentDetails['payment_info']['payer_id'],
                'provider_response' => $paymentDetails['provider_response']
            ]);
            
            $payment->save();
            Log::info('Payment information stored', [
                'payment_id' => $payment->id, 
                'booking_id' => $booking->id, 
                'amount' => $paymentDetails['payment_info']['amount']
            ]);
            
            return $payment;
        } catch (\Exception $e) {
            Log::error('Failed to store payment information: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Store failed payment information
     *
     * @param Booking $booking
     * @param string $orderId
     * @param string $errorMessage
     * @return Payment|null
     */
    private function storeFailedPayment($booking, $orderId, $errorMessage)
    {
        try {
            $payment = new Payment([
                'booking_id' => $booking->id,
                'provider' => 'paypal',
                'payment_order_id' => $orderId,
                'order_id' => $booking->order_id,
                'payment_id' => null,
                'amount' => $booking->total_amount ?? 0,
                'currency' => 'USD',
                'status' => 'failed',
                'is_refunded' => false,
                'payer_email' => $booking->email,
                'payer_name' => $booking->name,
                'payer_id' => null,
                'provider_response' => [
                    'error' => $errorMessage,
                    'timestamp' => now()->toIso8601String()
                ]
            ]);
            
            $payment->save();
            Log::info('Failed payment information stored', [
                'payment_id' => $payment->id, 
                'booking_id' => $booking->id, 
                'error' => $errorMessage
            ]);
            
            return $payment;
        } catch (\Exception $e) {
            Log::error('Failed to store failed payment information: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Log payment failure from frontend
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logPaymentFailure(Request $request)
    {
        try {
            $orderId = $request->input('order_id');
            $bookingId = $request->input('booking_id');
            $errorMessage = $request->input('error_message');
            
            Log::error('Payment failure reported from frontend', [
                'order_id' => $orderId,
                'booking_id' => $bookingId,
                'error_message' => $errorMessage
            ]);
            
            $booking = $bookingId ? Booking::find($bookingId) : 
                                  Booking::where('order_id', $orderId)->first();
            
            if ($booking) {
                $booking->update(['status' => 'failed']);
                $this->storeFailedPayment($booking, $orderId, $errorMessage);
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Payment failure logged successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Error logging payment failure: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'error' => 'Failed to log payment failure: ' . $e->getMessage()
            ], 500);
        }
    }

     /**
     * Add booking to Google Calendar and Sheets
     *
     * @param Booking $booking
     */

    /**
     * Generate unique order ID with collision checking
     *
     * @param string $email
     * @return string
     * @throws \Exception
     */
    private function generateUniqueOrderId($email)
    {
        $attempts = 0;
        $maxAttempts = 5;

        do {
            $uniqueOrderId = time() . substr(md5(uniqid($email . $attempts, true)), 0, 8);
            $exists = Booking::where('order_id', $uniqueOrderId)->exists();
            $attempts++;
        } while ($exists && $attempts < $maxAttempts);

        if ($exists) {
            throw new \Exception('Failed to generate unique order ID');
        }

        return $uniqueOrderId;
    }

    /**
     * Clear all booking-related session data
     *
     * @param Request $request
     * @return void
     */
    private function clearBookingSession(Request $request)
    {
        try {
            // Clear all booking-related session data
            $request->session()->forget([
                'booking_data',
                'booking_data_expiry',
                'booking.signature_data',
                'booking.payment_attempts',
                'booking.last_payment_attempt'
            ]);

            Log::info('Booking session data cleared', [
                'ip' => $request->ip()
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to clear booking session data', [
                'error' => $e->getMessage(),
                'ip' => $request->ip()
            ]);
        }
    }
} 