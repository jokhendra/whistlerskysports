<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $bookings = $query->latest()->paginate(10)->withQueryString();

        // Calculate statistics
        $stats = [
            'total_bookings' => Booking::count(),
            'pending_bookings' => Booking::where('flying_status', 'pending')->count(),
            'today_revenue' => Booking::whereDate('created_at', today())->sum('total_amount'),
            'yesterday_revenue' => Booking::whereDate('created_at', today()->subDay())->sum('total_amount'),
        ];

        // Calculate revenue change percentage
        $stats['revenue_change'] = $stats['yesterday_revenue'] > 0
            ? round((($stats['today_revenue'] - $stats['yesterday_revenue']) / $stats['yesterday_revenue']) * 100, 1)
            : 0;

        // Calculate conversion rate (confirmed bookings / total bookings)
        $confirmedBookings = Booking::where('flying_status', 'confirmed')->count();
        $stats['conversion_rate'] = $stats['total_bookings'] > 0
            ? round(($confirmedBookings / $stats['total_bookings']) * 100, 1)
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
            'status' => 'required|in:confirmed,canceled'
        ]);

        $booking->update([
            'flying_status' => $request->status
        ]);

        $statusMessage = ucfirst($request->status);
        return back()->with('success', "Booking #{$booking->id} has been {$statusMessage}");
    }

    /**
     * Export bookings to CSV
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function export()
    {
        $query = Booking::query();
        
        // Apply all filters including status filter
        $this->applyFilters($query, request('filter'));

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
} 