<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\BookingCancelled;
use App\Mail\BookingPostponed;
use App\Mail\BookingStatusUpdated;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AdminBookingController extends Controller
{
    /**
     * Apply common filters to the booking query
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $filter
     * @return void
     */
    private function applyFilters($query, $filter = null)
    {
        // Apply search if provided
        if ($search = request('search')) {
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('primary_phone', 'like', "%{$search}%")
                  ->orWhere('package', 'like', "%{$search}%");
            });
        }

        // Apply date range filter
        if ($dateFrom = request('date_from')) {
            $query->whereDate('created_at', '>=', $dateFrom);
        }
        if ($dateTo = request('date_to')) {
            $query->whereDate('created_at', '<=', $dateTo);
        }

        // Apply package filter
        if ($package = request('package')) {
            $query->where('package', $package);
        }

        // Apply add-ons filters
        if (request('has_video')) {
            $query->where('video_package', true);
        }
        if (request('has_deluxe')) {
            $query->where('deluxe_package', true);
        }
        if (request('has_merch')) {
            $query->where('merch_package', '>', 0);
        }

        // Apply status filter
        switch ($filter) {
            case 'today':
                $query->whereDate('created_at', today());
                break;
            case 'confirmed':
                $query->where('flying_status', 'confirmed');
                break;
            case 'pending':
                $query->where('flying_status', 'pending');
                break;
            case 'canceled':
                $query->where('flying_status', 'canceled');
                break;
        }
    }

    /**
     * Display a listing of the bookings.
     *
     * @param string|null $filter
     * @return \Illuminate\View\View
     */
    public function index($filter = null)
    {
        $query = Booking::query();
        $this->applyFilters($query, $filter);
        
        // Get perPage parameter from request, default to 10
        $perPage = request()->input('perPage', 10);
        
        $bookings = $query->latest()->paginate($perPage)->withQueryString();

        // Calculate statistics
        $stats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('flying_status', 'pending')->count(),
            'confirmed_bookings' => Booking::where('flying_status', 'confirmed')->count(),
            'canceled_bookings' => Booking::where('flying_status', 'canceled')->count(),
            'today_revenue' => Booking::whereDate('created_at', today())->sum('total_amount'),
            'yesterday_revenue' => Booking::whereDate('created_at', today()->subDay())->sum('total_amount'),
        ];

        // Calculate revenue change percentage
        $stats['revenue_change'] = $stats['yesterday_revenue'] > 0
            ? round((($stats['today_revenue'] - $stats['yesterday_revenue']) / $stats['yesterday_revenue']) * 100, 1)
            : 0;

        // Calculate conversion rate (confirmed bookings / total bookings)
        $stats['conversion_rate'] = $stats['total_bookings'] > 0
            ? round(($stats['confirmed_bookings'] / $stats['total_bookings']) * 100, 1)
            : 0;

        return view('admin.bookings.index', compact('bookings', 'filter', 'stats'));
    }

    /**
     * Update the status of a booking
     *
     * @param Request $request
     * @param Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:confirmed,canceled',
            'flying_time' => 'required_if:status,confirmed|nullable|date_format:Y-m-d\TH:i',
        ]);

        $data = [
            'flying_status' => $request->status
        ];
        
        // Add flying time if provided
        if ($request->status === 'confirmed' && $request->flying_time) {
            // Convert from HTML datetime-local format to the required database format
            $flyingTime = Carbon::createFromFormat('Y-m-d\TH:i', $request->flying_time)->format('Y-m-d H:i:00');
            $data['flying_time'] = $flyingTime;
        }
        
        $booking->update($data);

        $statusMessage = ucfirst($request->status);
        
        // Send appropriate email based on status
        try {
            if ($request->status === 'confirmed') {
                Mail::to($booking->email)->send(new BookingStatusUpdated($booking));
            } elseif ($request->status === 'canceled') {
                // Add cancellation reason if provided
                if ($request->filled('cancellation_reason')) {
                    $booking->update(['cancellation_reason' => $request->cancellation_reason]);
                }
                
                Mail::to($booking->email)->send(new BookingCancelled($booking));
            }
        } catch (\Exception $e) {
            // Log the error but don't stop execution
            Log::error('Failed to send booking ' . $request->status . ' email: ' . $e->getMessage());
        }
        
        return back()->with('success', "Booking #{$booking->id} has been {$statusMessage}");
    }

    /**
     * Postpone a booking to a new date
     *
     * @param Request $request
     * @param Booking $booking
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postponeBooking(Request $request, Booking $booking)
    {
        $request->validate([
            'flying_time' => 'required|date_format:Y-m-d\TH:i',
            'postponement_reason' => 'nullable|string|max:255',
        ]);

        // Store the original date for the email notification
        $originalDate = $booking->flying_time 
            ? Carbon::parse($booking->flying_time)->format('F d, Y g:i A')
            : Carbon::parse($booking->preferred_dates)->format('F d, Y');

        // Convert from HTML datetime-local format to the required database format
        $flyingTime = Carbon::createFromFormat('Y-m-d\TH:i', $request->flying_time)->format('Y-m-d H:i:00');
        
        // Update the booking with the new flying time
        $booking->update([
            'flying_time' => $flyingTime,
            'flying_status' => 'confirmed' // Ensure the status is confirmed
        ]);

        // Send postponement email notification
        try {
            Mail::to($booking->email)->send(new BookingPostponed(
                $booking, 
                $originalDate, 
                $request->postponement_reason
            ));
        } catch (\Exception $e) {
            // Log the error but don't stop execution
            Log::error('Failed to send booking postponement email: ' . $e->getMessage());
        }
        
        return back()->with('success', "Booking #{$booking->id} has been postponed to " . Carbon::parse($flyingTime)->format('F d, Y g:i A'));
    }

    /**
     * Export bookings to CSV
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        $query = Booking::query();
        
        // Check if a specific booking ID is requested
        if (request('id')) {
            $query->where('id', request('id'));
        } else {
            // Apply all filters including status filter
            $this->applyFilters($query, request('filter'));
        }

        $fileName = 'bookings-' . now()->format('Y-m-d') . '.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ];

        $columns = [
            'ID', 'Name', 'Email', 'Phone', 'Package', 'Flight Date', 'Status',
            'Total Amount', 'Created At', 'Video Package', 'Deluxe Package',
            'Merch Package', 'Sunrise Flight'
        ];

        $callback = function() use ($query, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($query->latest()->get() as $booking) {
                fputcsv($file, [
                    $booking->id,
                    $booking->name,
                    $booking->email,
                    $booking->primary_phone,
                    $booking->package,
                    $booking->preferred_dates->format('Y-m-d'),
                    $booking->flying_status,
                    $booking->total_amount,
                    $booking->created_at->format('Y-m-d H:i:s'),
                    $booking->video_package ? 'Yes' : 'No',
                    $booking->deluxe_package ? 'Yes' : 'No',
                    $booking->merch_package,
                    $booking->sunrise_flight ? 'Yes' : 'No'
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    
    /**
     * Display the specified booking.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        
        return view('admin.bookings.show', compact('booking'));
    }
} 