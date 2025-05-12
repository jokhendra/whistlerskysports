<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the orders.
     */
    public function index(Request $request)
    {
        $query = Order::with(['items', 'user', 'payments'])
            ->orderBy('created_at', 'desc');
        
        // Filter by order number
        if ($request->filled('order_number')) {
            $query->where('order_number', 'like', '%' . $request->order_number . '%');
        }
        
        // Filter by status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        // Filter by payment status
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }
        
        // Filter by date range
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        // Filter by customer
        if ($request->filled('customer')) {
            $searchTerm = $request->customer;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        
        $orders = $query->paginate(15)->withQueryString();
        
        // Get order status options for filter dropdown
        $statuses = [
            'pending' => 'Pending',
            'processing' => 'Processing', 
            'completed' => 'Completed', 
            'shipped' => 'Shipped', 
            'delivered' => 'Delivered', 
            'cancelled' => 'Cancelled', 
            'refunded' => 'Refunded', 
            'failed' => 'Failed'
        ];
        
        // Get payment status options for filter dropdown
        $paymentStatuses = [
            'pending' => 'Pending',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'failed' => 'Failed',
            'refunded' => 'Refunded'
        ];
        
        return view('admin.orders.index', compact('orders', 'statuses', 'paymentStatuses'));
    }

    /**
     * Display the specified order.
     */
    public function show($id)
    {
        $order = Order::with(['items.product', 'payments'])->findOrFail($id);
        
        // Get order status options for the update form
        $statuses = [
            'pending' => 'Pending',
            'processing' => 'Processing', 
            'completed' => 'Completed', 
            'shipped' => 'Shipped', 
            'delivered' => 'Delivered', 
            'cancelled' => 'Cancelled', 
            'refunded' => 'Refunded', 
            'failed' => 'Failed'
        ];
        
        // Get payment status options for the update form
        $paymentStatuses = [
            'pending' => 'Pending',
            'processing' => 'Processing',
            'completed' => 'Completed',
            'failed' => 'Failed',
            'refunded' => 'Refunded'
        ];
        
        return view('admin.orders.show', compact('order', 'statuses', 'paymentStatuses'));
    }

    /**
     * Update the specified order.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,shipped,delivered,cancelled,refunded,failed',
            'payment_status' => 'required|in:pending,processing,completed,failed,refunded',
            'tracking_number' => 'nullable|string|max:255',
            'shipping_provider' => 'nullable|string|max:255',
            'admin_notes' => 'nullable|string'
        ]);
        
        $order = Order::findOrFail($id);
        
        // Update the order
        $order->update([
            'status' => $request->status,
            'payment_status' => $request->payment_status,
            'tracking_number' => $request->tracking_number,
            'shipping_provider' => $request->shipping_provider,
            'admin_notes' => $request->admin_notes
        ]);
        
        Log::info('Order updated by admin', [
            'order_id' => $order->id,
            'order_number' => $order->order_number,
            'status' => $order->status,
            'payment_status' => $order->payment_status,
            'admin_id' => auth()->guard('admin')->id()
        ]);
        
        return redirect()->route('admin.orders.show', $order->id)
            ->with('success', 'Order has been updated successfully');
    }

    /**
     * Export orders in CSV format.
     */
    public function export(Request $request)
    {
        $query = Order::with(['items']);
        
        // Apply the same filters as in the index method
        if ($request->filled('order_number')) {
            $query->where('order_number', 'like', '%' . $request->order_number . '%');
        }
        
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        
        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }
        
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        if ($request->filled('customer')) {
            $searchTerm = $request->customer;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('email', 'like', "%{$searchTerm}%");
            });
        }
        
        $orders = $query->get();
        
        // Generate CSV file
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="orders_' . date('Y-m-d') . '.csv"',
        ];
        
        $callback = function() use ($orders) {
            $file = fopen('php://output', 'w');
            
            // CSV headers
            fputcsv($file, [
                'Order ID', 
                'Order Number', 
                'Date', 
                'Customer Name', 
                'Email', 
                'Total', 
                'Status', 
                'Payment Status',
                'Items'
            ]);
            
            // CSV rows
            foreach ($orders as $order) {
                fputcsv($file, [
                    $order->id,
                    $order->order_number,
                    $order->created_at->format('Y-m-d H:i:s'),
                    $order->name,
                    $order->email,
                    $order->total,
                    $order->status,
                    $order->payment_status,
                    $order->items->count()
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
} 