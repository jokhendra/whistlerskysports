<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class EnsureBookingSuccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            // Get booking ID from session or query parameter
            $bookingId = Session::get('last_successful_booking_id') ?? $request->query('booking_id');
            
            if (!$bookingId) {
                $this->logUnauthorizedAccess($request, 'No booking ID found');
                return $this->redirectToHome();
            }

            // Verify booking exists and is confirmed
            $booking = Booking::where('id', $bookingId)
                            ->where('status', 'confirmed')
                            ->first();

            if (!$booking) {
                $this->logUnauthorizedAccess($request, 'Invalid or unconfirmed booking', ['booking_id' => $bookingId]);
                return $this->redirectToHome();
            }

            // Verify the booking belongs to the current user (if logged in)
            if (Auth::check() && $booking->user_id && $booking->user_id !== Auth::id()) {
                $this->logUnauthorizedAccess($request, 'Booking does not belong to user', [
                    'booking_id' => $bookingId,
                    'user_id' => Auth::id()
                ]);
                return $this->redirectToHome();
            }

            // Check for the token to prevent direct access
            $token = $request->query('token');
            
            // If there's no token or session confirmation, deny access
            if (!$token && !Session::has('last_successful_booking_id')) {
                $this->logUnauthorizedAccess($request, 'Direct access attempt without token', [
                    'booking_id' => $bookingId
                ]);
                return $this->redirectToHome();
            }
            
            // If there's a token, validate it contains the booking ID (basic validation)
            if ($token) {
                try {
                    $decodedToken = base64_decode($token);
                    if (!str_contains($decodedToken, $bookingId . '-')) {
                        $this->logUnauthorizedAccess($request, 'Invalid token', [
                            'booking_id' => $bookingId,
                            'token' => $token
                        ]);
                        return $this->redirectToHome();
                    }
                } catch (\Exception $e) {
                    $this->logUnauthorizedAccess($request, 'Token validation error', [
                        'booking_id' => $bookingId,
                        'token' => $token,
                        'error' => $e->getMessage()
                    ]);
                    return $this->redirectToHome();
                }
            }

            // Add booking to request for use in the controller
            $request->merge(['booking' => $booking]);

            return $next($request);
        } catch (\Exception $e) {
            Log::error('Error in EnsureBookingSuccess middleware', [
                'error' => $e->getMessage(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
            return $this->redirectToHome();
        }
    }

    /**
     * Log unauthorized access attempts
     *
     * @param Request $request
     * @param string $reason
     * @param array $context
     * @return void
     */
    private function logUnauthorizedAccess(Request $request, string $reason, array $context = [])
    {
        Log::warning('Unauthorized access attempt to success page', array_merge([
            'reason' => $reason,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'user_id' => Auth::id() ?? 'guest'
        ], $context));
    }

    /**
     * Redirect to home page with flash message
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectToHome()
    {
        Session::flash('error', 'You do not have permission to access this page.');
        return redirect()->route('home');
    }
} 