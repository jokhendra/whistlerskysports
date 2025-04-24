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
            // Convert checkbox values to boolean
            $request->merge([
                'video_package' => $request->has('video_package'),
                'deluxe_package' => $request->has('deluxe_package'),
                'terms' => $request->has('terms'),
                'waiver' => $request->has('waiver')
            ]);

            // Validate request data
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'primary_phone' => 'required|string',
                'timezone' => 'required|string',
                'local_phone' => 'required|string',
                'package' => 'required|string',
                'flyer_details' => 'required|string',
                'underage_flyers' => 'nullable|string',
                'preferred_dates' => 'required|date',
                'sunrise_flight' => 'required|string',
                'video_package' => 'boolean',
                'deluxe_package' => 'boolean',
                'merch_package' => 'nullable|integer',
                'accommodation' => 'nullable|string',
                'special_event' => 'nullable|string',
                'additional_info' => 'nullable|string',
                'terms' => 'accepted',
                'waiver' => 'accepted',
                'emergency_name' => 'nullable|string|max:255',
                'emergency_relationship' => 'nullable|string|max:255',
                'emergency_phone' => 'nullable|string|max:20'
            ]);

            // Clean phone numbers
            $validated['primary_phone'] = preg_replace('/[^0-9+]/', '', $validated['primary_phone']);
            $validated['local_phone'] = preg_replace('/[^0-9+]/', '', $validated['local_phone']);

            // Calculate total amount and generate waiver
            $totalAmount = $this->calculateTotalAmount($validated);
            $pdfPath = $this->generateWaiverPDF($request, $totalAmount);

            // Generate unique order ID
            $uniqueOrderId = time() . substr(md5(uniqid($validated['email'], true)), 0, 8);
            
            // Store booking data in session
            $bookingData = array_merge($validated, [
                'total_amount' => $totalAmount,
                'waiver_pdf_path' => $pdfPath,
                'order_id' => $uniqueOrderId
            ]);
            session(['booking_data' => $bookingData]);

            return view('booking.preview', [
                'booking' => $bookingData,
                'waiver_pdf' => $pdfPath,
                'totalAmount' => $totalAmount
            ]);

        } catch (\Exception $e) {
            Log::error('Booking preview error: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
            Log::error('Request data: ' . json_encode($request->all()));
            
            return redirect()->back()
                ->withInput()
                ->withErrors([
                    'error' => 'There was an error processing your booking. Please try again.',
                    'debug_info' => 'Error: ' . $e->getMessage() . ' | File: ' . $e->getFile() . ' | Line: ' . $e->getLine()
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
        Log::info('###################################');
        Log::info('Generating waiver PDF', ['data' => $data]);
        Log::info('###################################');
        $pdf = PDF::loadView('pdfs.waiver', $data);
        
        $fileName = 'waiver_' . str_replace(' ', '_', $request->name) . '_' . time() . '.pdf';
        $pdfPath = 'waivers/' . $fileName;
        Storage::disk('public')->put($pdfPath, $pdf->output());

        return $pdfPath;
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
     * Create a new booking record
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createBooking(Request $request)
    {
        $bookingData = session('booking_data');
        
        if (!$bookingData) {
            return response()->json([
                'success' => false,
                'error' => 'Booking data not found'
            ]);
        }

        try {
            $booking = Booking::create([
                'name' => $bookingData['name'],
                'email' => $bookingData['email'],
                'primary_phone' => $bookingData['primary_phone'],
                'timezone' => $bookingData['timezone'],
                'local_phone' => $bookingData['local_phone'],
                'package' => $bookingData['package'],
                'flyer_details' => $bookingData['flyer_details'],
                'underage_flyers' => $bookingData['underage_flyers'] ?? null,
                'preferred_dates' => $bookingData['preferred_dates'],
                'sunrise_flight' => $bookingData['sunrise_flight'],
                'video_package' => $bookingData['video_package'] ?? false,
                'deluxe_package' => $bookingData['deluxe_package'] ?? false,
                'merch_package' => $bookingData['merch_package'] ?? 0,
                'accommodation' => $bookingData['accommodation'] ?? null,
                'special_event' => $bookingData['special_event'] ?? null,
                'additional_info' => $bookingData['additional_info'] ?? null,
                'total_amount' => $bookingData['total_amount'],
                'waiver_pdf_path' => $bookingData['waiver_pdf_path'],
                'status' => 'pending',
                'order_id' => $bookingData['order_id']
            ]);

            return response()->json([
                'success' => true,
                'booking_id' => $booking->id,
                'order_id' => $booking->order_id
            ]);

        } catch (\Exception $e) {
            Log::error('Booking creation error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Failed to create booking: ' . $e->getMessage()
            ]);
        }
    }

    /**
     * Capture payment for a booking
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function capturePayment(Request $request)
    {
        try {
            $orderId = $request->input('order_id');
            $bookingId = $request->input('booking_id');
            Log::info('Starting payment capture process', ['order_id' => $orderId, 'booking_id' => $bookingId]);
            
            if (!$orderId) {
                return response()->json([
                    'success' => false,
                    'error' => 'Order ID is required'
                ]);
            }
            
            $this->initializePayPal();
            
            try {
                // Capture the payment first
            $capture = $this->capturePayPalPayment($orderId);
            Log::info('PayPal capture response:', ['capture' => $capture]);
                
                $paymentDetails = $this->extractPaymentDetails($capture);
                $referenceId = $capture['purchase_units'][0]['reference_id'];
                
                $booking = $bookingId ? Booking::find($bookingId) : 
                                      Booking::where('order_id', $orderId)->first();
                    
                if (!$booking) {
                    throw new \Exception('Booking not found');
                }

                // Handle critical operations in a transaction
                DB::transaction(function () use ($booking, $paymentDetails, $orderId) {
                    // Update booking status
                    $booking->update([
                        'status' => 'confirmed',
                            'payment_id' => $paymentDetails['payment_info']['payment_id'] ?? null,
                        'payment_order_id' => $orderId
                    ]);
                        
                        // Store payment information
                        $this->storePayment($booking, $paymentDetails);
                });
                        
                // Dispatch non-critical operations to queue
                ProcessBookingConfirmation::dispatch($booking)
                    ->delay(now()->addSeconds(5)); // Small delay to ensure transaction is committed
            
            return response()->json([
                'success' => true,
                'message' => 'Payment captured successfully',
                'capture_id' => $capture['id'] ?? null
            ]);

        } catch (\Exception $e) {
                $this->handlePaymentError($e, $bookingId, $orderId);
                throw $e;
            }

        } catch (\Exception $e) {
            Log::error('Payment capture error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Failed to capture payment: ' . $e->getMessage()
            ]);
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
        Log::error('Payment error: ' . $e->getMessage());
        Log::error('Error trace: ' . $e->getTraceAsString());
        
        $booking = $bookingId ? Booking::find($bookingId) : 
                               Booking::where('order_id', $orderId)->first();
        
        if ($booking) {
            $booking->update(['status' => 'failed']);
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
        return view('booking.success');
    }

    /**
     * Calculate total amount for booking
     *
     * @param array $data
     * @return float
     */
    private function calculateTotalAmount($data)
    {
        $total = $this->getPackagePrice($data['package']);

        if ($data['video_package'] ?? false) {
            $total += 90;
        }

        if ($data['deluxe_package'] ?? false) {
            $total += 120;
        }

        $total += ($data['merch_package'] ?? 0) * 40;

        if ($data['sunrise_flight'] === 'yes') {
            $total += 99;
        }

        return $total;
    }

    /**
     * Get base price for a package
     *
     * @param string $package
     * @return float
     */
    private function getPackagePrice($package)
    {
        $prices = [
            'intro' => 229,
            'basic' => 199,
            'advanced' => 299,
            'certification' => 499
        ];

        return $prices[$package] ?? 0;
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
    private function addBookingToGoogleServices(Booking $booking)
    {
        try {
            $googleService = $this->initializeGoogle();
            
            if ($googleService) {
                $calendarEventId = $googleService->addBookingToCalendar($booking);
                if ($calendarEventId) {
                    Log::info('Booking added to Google Calendar', [
                        'booking_id' => $booking->id,
                        'calendar_event_id' => $calendarEventId
                    ]);
                }
                
                $sheetsResult = $googleService->addBookingToSheet($booking);
                if ($sheetsResult) {
                    Log::info('Booking added to Google Sheets', [
                        'booking_id' => $booking->id
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Error adding booking to Google services: ' . $e->getMessage());
            Log::error('Error trace: ' . $e->getTraceAsString());
        }
    }
} 