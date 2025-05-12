<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Notifications\OrderConfirmation;
use App\Services\PayPalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;

class CartController extends Controller
{
    // Add a product to the cart
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Check if user is authenticated for AJAX requests
        if (!Auth::check()) {
            if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
                return response()->json([
                    'success' => false,
                    'redirect' => route('login'),
                    'message' => 'Please login to add items to cart'
                ], 401);
            }
            
            // For non-AJAX requests, redirect to login
            return redirect()->route('login')->with('error', 'Please login to add items to cart');
        }

        $product = Product::findOrFail($request->product_id);
        
        // Get or create cart
        $cart = $this->getCart(true); // Load items relationship
        
        Log::info('Adding to cart', [
            'user_id' => Auth::id(),
            'cart_id' => $cart->id,
            'product_id' => $product->id,
            'quantity' => $request->quantity
        ]);
        
        // Check if product already exists in cart
        $cartItem = $cart->items()->where('product_id', $product->id)->first();
        
        if ($cartItem) {
            // Update quantity if product already in cart
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Create new cart item
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->price
            ]);
        }
        
        // Important: Always refresh the cart with items after making changes
        $cart->fresh(['items']);
        
        // Update cart total
        $cart->calculateTotal();
        
        // Get updated cart count
        $cartCount = $cart->items->sum('quantity');
        
        // Store cart ID in session to ensure persistence
        session(['cart_id' => $cart->id]);
        
        Log::info('Cart updated', [
            'cart_id' => $cart->id,
            'user_id' => Auth::id(),
            'cart_count' => $cartCount,
            'total' => $cart->total
        ]);
        
        // If it's an AJAX request, return JSON response
        if ($request->ajax() || $request->wantsJson() || $request->header('X-Requested-With') === 'XMLHttpRequest') {
            return response()->json([
                'success' => true,
                'message' => 'Product added to cart successfully!',
                'cart_count' => $cartCount
            ]);
        }
        
        // Otherwise redirect with success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    
    // Get cart count for AJAX requests
    public function getCartCount(Request $request)
    {
        // This method should work for both guests and logged-in users
        try {
            // Get or create cart with items explicitly loaded
            $cart = $this->getCart(true);
            
            // Calculate count safely
            $count = 0;
            if ($cart && $cart->items) {
                $count = $cart->items->sum('quantity');
            }
            
            Log::info('Cart count requested', [
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'cart_id' => $cart->id ?? 'none',
                'count' => $count
            ]);
            
            return response()->json([
                'success' => true,
                'cart_count' => $count
            ]);
        } catch (\Exception $e) {
            Log::error('Error getting cart count', [
                'error' => $e->getMessage(),
                'user_id' => Auth::check() ? Auth::id() : 'guest'
            ]);
            
            return response()->json([
                'success' => false,
                'cart_count' => 0,
                'error' => 'Error retrieving cart count'
            ]);
        }
    }
    
    // Display cart contents
    public function viewCart()
    {
        $cart = $this->getCart(true);
        
        // Recalculate total to ensure accuracy
        $calculatedTotal = 0;
        foreach ($cart->items as $item) {
            $calculatedTotal += ($item->price * $item->quantity);
        }
        
        // If the stored total doesn't match the calculated total, update it
        if ($calculatedTotal != $cart->total) {
            Log::warning('Cart total mismatch detected', [
                'cart_id' => $cart->id,
                'stored_total' => $cart->total,
                'calculated_total' => $calculatedTotal,
                'items_count' => $cart->items->count()
            ]);
            
            $cart->total = $calculatedTotal;
            $cart->save();
        }
        
        // Add logging for cart viewing
        Log::info('Cart viewed', [
            'user_id' => Auth::check() ? Auth::id() : 'guest',
            'cart_id' => $cart->id,
            'items_count' => $cart->items->count(),
            'total' => $cart->total,
            'session_id' => $cart->session_id
        ]);
        
        return view('mad-mr-bert.cart', ['cart' => $cart]);
    }
    
    // Update cart item quantity
    public function updateCart(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);
        
        try {
            $cartItem = CartItem::findOrFail($request->cart_item_id);
            
            // Ensure user owns this cart item
            $cart = $this->getCart(true);
            if ($cartItem->cart_id != $cart->id) {
                return redirect()->back()->with('error', 'Unauthorized action');
            }
            
            // Update the quantity
            $oldQuantity = $cartItem->quantity;
            $cartItem->quantity = $request->quantity;
            $cartItem->save();
            
            // Force reload the cart with all items
            $cart->fresh(['items']);
            
            // Recalculate cart total
            $cart->calculateTotal();
            
            // Log the update
            Log::info('Cart item updated', [
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'cart_id' => $cart->id,
                'item_id' => $cartItem->id,
                'product_id' => $cartItem->product_id,
                'old_quantity' => $oldQuantity,
                'new_quantity' => $cartItem->quantity,
                'new_total' => $cart->total
            ]);
            
            return redirect()->back()->with('success', 'Cart updated successfully!');
        } catch (\Exception $e) {
            Log::error('Error updating cart item', [
                'error' => $e->getMessage(),
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'cart_item_id' => $request->cart_item_id
            ]);
            
            return redirect()->back()->with('error', 'Error updating cart. Please try again.');
        }
    }
    
    // Remove item from cart
    public function removeItem(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id'
        ]);
        
        $cartItem = CartItem::findOrFail($request->cart_item_id);
        
        // Ensure user owns this cart item
        $cart = $this->getCart();
        if ($cartItem->cart_id != $cart->id) {
            return redirect()->back()->with('error', 'Unauthorized action');
        }
        
        $cartItem->delete();
        $cart->calculateTotal();
        
        return redirect()->back()->with('success', 'Item removed from cart');
    }
    
    // Proceed to checkout
    public function checkout()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to proceed to checkout');
        }
        
        // Get cart with items explicitly loaded
        $cart = $this->getCart(true);
        
        // Add detailed logging
        Log::info('Checkout initiated', [
            'user_id' => Auth::id(),
            'cart_id' => $cart->id,
            'items_count' => $cart->items->count(),
            'items' => $cart->items->toArray(),
            'total' => $cart->total
        ]);
        
        if ($cart->items->count() == 0) {
            return redirect()->route('mad-mr-bert.merchandise')->with('error', 'Your cart is empty!');
        }
        
        // Make sure cart is in active status
        if ($cart->status !== 'active') {
            // Reset to active if it's in an invalid state
            $cart->status = 'active';
            $cart->save();
        }
        
        // Change cart status to checkout
        $cart->status = 'checkout';
        $cart->save();
        
        // Store checkout cart ID in session to ensure consistency
        session(['checkout_cart_id' => $cart->id]);
        
        return view('mad-mr-bert.checkout', ['cart' => $cart]);
    }
    
    // Process order
    public function processOrder(Request $request)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            Log::warning('Unauthorized checkout attempt', [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
            return redirect()->route('login')->with('error', 'Please login to complete your order');
        }
        
        try {
            // Validate shipping information
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:20',
                'address' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'nullable|string|max:100',
                'postal_code' => 'required|string|max:20',
                'country' => 'nullable|string|max:100',
                'same_as_shipping' => 'sometimes|boolean',
                'payment_method' => 'required|in:paypal'
            ]);
            
            // If billing address is different, validate billing fields
            if (!$request->boolean('same_as_shipping')) {
                $request->validate([
                    'billing_name' => 'required|string|max:255',
                    'billing_email' => 'required|email|max:255',
                    'billing_phone' => 'nullable|string|max:20',
                    'billing_address' => 'required|string|max:255',
                    'billing_city' => 'required|string|max:255',
                    'billing_state' => 'nullable|string|max:100',
                    'billing_postal_code' => 'required|string|max:20',
                    'billing_country' => 'nullable|string|max:100',
                ]);
            }
            
            // Use the cart ID from checkout session if available
            if (session()->has('checkout_cart_id')) {
                $cartId = session('checkout_cart_id');
                $cart = Cart::with('items.product')->find($cartId);
                
                if (!$cart) {
                    Log::error('Checkout cart not found', [
                        'user_id' => Auth::id(),
                        'checkout_cart_id' => $cartId
                    ]);
                    // Fallback to getting a new cart
                    $cart = $this->getCart(true);
                }
            } else {
                // Fallback if no checkout cart ID in session
                $cart = $this->getCart(true);
            }
            
            Log::info('Cart details', [
                'cart_id' => $cart->id,
                'user_id' => Auth::id(),
                'items_count' => $cart->items->count(),
                'items' => $cart->items->toArray(),
                'total' => $cart->total,
                'from_checkout_session' => session()->has('checkout_cart_id')
            ]);
            
            $userId = Auth::id();
            
            if ($cart->items->count() == 0) {
                Log::warning('Checkout attempted with empty cart', [
                    'user_id' => $userId,
                    'cart_id' => $cart->id
                ]);
                return redirect()->route('mad-mr-bert.merchandise')->with('error', 'Your cart is empty!');
            }
            
            // Debug logging for cart items
            Log::info('Cart items before order creation', [
                'user_id' => $userId,
                'cart_id' => $cart->id,
                'items_count' => $cart->items->count(),
                'items' => $cart->items->map(function($item) {
                    return [
                        'id' => $item->id,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'product' => $item->product ? [
                            'id' => $item->product->id,
                            'name' => $item->product->name,
                        ] : null
                    ];
                })->toArray()
            ]);
            
            // Make sure the cart is in checkout or active status
            if (!in_array($cart->status, ['active', 'checkout'])) {
                Log::warning('Invalid cart status during checkout', [
                    'user_id' => $userId,
                    'cart_id' => $cart->id,
                    'status' => $cart->status
                ]);
                return redirect()->route('mad-mr-bert.cart')->with('error', 'Invalid cart status. Please try again.');
            }
            
            // Create an order in the database
            $orderData = [
                'user_id' => $userId,
                'cart_id' => $cart->id,
                'order_number' => Order::generateOrderNumber(),
                'total' => $cart->total + 0.00, // Add $0 shipping cost (free shipping)
                'tax' => 0,
                'shipping_cost' => 0.00, // Set shipping cost to $0 (free shipping)
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country ?? 'Canada',
                'status' => 'pending',
                'payment_status' => 'pending',
                'notes' => $request->notes ?? null,
                'same_as_shipping' => $request->boolean('same_as_shipping'),
            ];
            
            // Add billing information if shipping address is not used as billing
            if (!$request->boolean('same_as_shipping')) {
                $orderData = array_merge($orderData, [
                    'billing_name' => $request->billing_name,
                    'billing_email' => $request->billing_email,
                    'billing_phone' => $request->billing_phone,
                    'billing_address' => $request->billing_address,
                    'billing_city' => $request->billing_city,
                    'billing_state' => $request->billing_state,
                    'billing_postal_code' => $request->billing_postal_code,
                    'billing_country' => $request->billing_country,
                ]);
            }
            
            $order = new Order($orderData);
            $order->save();
            
            // Create order items
            foreach ($cart->items as $cartItem) {
                $product = $cartItem->product;
                
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_description' => $product->description,
                    'product_image' => $product->image,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                    'subtotal' => $cartItem->price * $cartItem->quantity
                ]);
            }
            
            // Refresh order with items
            $order->refresh();
            $order->load('items');
            
            // Log the created order items
            Log::info('Order items created', [
                'order_id' => $order->id,
                'items_count' => $order->items->count(),
                'items' => $order->items->map(function($item) {
                    return [
                        'id' => $item->id,
                        'product_id' => $item->product_id,
                        'product_name' => $item->product_name,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'subtotal' => $item->subtotal
                    ];
                })->toArray()
            ]);
            
            // Store order ID in session for further steps
            session(['order_id' => $order->id]);
            
            // If we're using PayPal, create a PayPal order and redirect to PayPal
            if ($request->payment_method === 'paypal') {
                $paypalService = app(PayPalService::class);
                
                $returnUrl = route('mad-mr-bert.paypal.success');
                $cancelUrl = route('mad-mr-bert.paypal.cancel');
                
                // Prepare shipping details for PayPal
                $shippingDetails = [
                    'name' => $request->name,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'postal_code' => $request->postal_code,
                    'country_code' => $this->getCountryCode($request->country)
                ];
                
                $paypalOrder = $paypalService->createOrder(
                    $order->total, // Total including shipping
                    'USD',
                    $returnUrl,
                    $cancelUrl,
                    $order->order_number,
                    'Order from Whistler Sky Sports - ' . $order->order_number,
                    $shippingDetails
                );
                
                if (!$paypalOrder) {
                    Log::error('Failed to create PayPal order', [
                        'order_id' => $order->id,
                        'order_number' => $order->order_number,
                        'amount' => $order->total
                    ]);
                    
                    return redirect()->route('mad-mr-bert.checkout')
                        ->with('error', 'Failed to connect to payment gateway. Please try again later.');
                }
                
                // Store PayPal order ID in our database
                $order->update([
                    'notes' => json_encode([
                        'paypal_order_id' => $paypalOrder['id'],
                        'original_notes' => $order->notes
                    ])
                ]);
                
                // Find PayPal approval URL
                $approvalUrl = null;
                foreach ($paypalOrder['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        $approvalUrl = $link['href'];
                        break;
                    }
                }
                
                if (!$approvalUrl) {
                    Log::error('No PayPal approval URL found', [
                        'order_id' => $order->id,
                        'paypal_order_id' => $paypalOrder['id'],
                        'paypal_response' => $paypalOrder
                    ]);
                    
                    return redirect()->route('mad-mr-bert.checkout')
                        ->with('error', 'Error connecting to payment gateway. Please try again.');
                }
                
                // Redirect to PayPal for payment
                return redirect()->away($approvalUrl);
            }
            
            // Default fallback (shouldn't be reached with current validation)
            return redirect()->route('mad-mr-bert.checkout')
                ->with('error', 'Invalid payment method selected.');
                
        } catch (\Exception $e) {
            // Log the error with details
            Log::error('Order processing error', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request' => $request->except(['_token']),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            // Return user to checkout with error message
            return redirect()->route('mad-mr-bert.checkout')
                ->with('error', 'There was a problem processing your order. Please try again.');
        }
    }
    
    /**
     * Handle successful PayPal payment
     */
    public function paypalSuccess(Request $request)
    {
        $paypalOrderId = $request->token;
        
        if (!$paypalOrderId) {
            Log::error('PayPal success but no order ID', [
                'request' => $request->all(),
                'user_id' => Auth::id()
            ]);
            
            return redirect()->route('mad-mr-bert.cart')
                ->with('error', 'We could not verify your payment. Please contact support.');
        }
        
        try {
            // Get the order ID from session
            $orderId = session('order_id');
            
            if (!$orderId) {
                Log::error('PayPal success but no local order ID in session', [
                    'paypal_order_id' => $paypalOrderId,
                    'user_id' => Auth::id(),
                    'session' => session()->all()
                ]);
                
                return redirect()->route('mad-mr-bert.cart')
                    ->with('error', 'Session expired. Please try placing your order again.');
            }
            
            // Ensure order is loaded with its items
            $order = Order::with('items')->find($orderId);
            
            if (!$order) {
                Log::error('PayPal success but order not found', [
                    'order_id' => $orderId,
                    'paypal_order_id' => $paypalOrderId,
                    'user_id' => Auth::id()
                ]);
                
                return redirect()->route('mad-mr-bert.cart')
                    ->with('error', 'Order not found. Please contact support.');
            }
            
            // Verify payment with PayPal
            $paypalService = app(PayPalService::class);
            $paymentCapture = $paypalService->captureOrder($paypalOrderId);
            
            if (!$paymentCapture || $paymentCapture['status'] !== 'COMPLETED') {
                Log::error('PayPal payment capture failed', [
                    'order_id' => $order->id,
                    'paypal_order_id' => $paypalOrderId,
                    'capture_response' => $paymentCapture ?? 'null',
                    'user_id' => Auth::id()
                ]);
                
                $order->update([
                    'status' => 'failed',
                    'payment_status' => 'failed'
                ]);
                
                return redirect()->route('mad-mr-bert.cart')
                    ->with('error', 'Payment verification failed. Please try again or contact support.');
            }
            
            // Extract payment details from PayPal response
            $paymentDetails = $paypalService->extractPaymentDetails($paymentCapture);
            
            // Store payment information
            $payment = new Payment([
                'order_id' => $order->id,
                'payment_type' => 'order',
                'provider' => 'paypal',
                'payment_order_id' => $paypalOrderId,
                'payment_id' => $paymentDetails['payment_info']['payment_id'],
                'amount' => $paymentDetails['payment_info']['amount'],
                'currency' => $paymentDetails['payment_info']['currency'],
                'status' => 'completed',
                'payer_email' => $paymentDetails['payment_info']['payer_email'],
                'payer_name' => $paymentDetails['payment_info']['payer_name'],
                'payer_phone' => $paymentDetails['payment_info']['payer_phone'] ?? $order->phone,
                'payer_id' => $paymentDetails['payment_info']['payer_id'],
                'provider_response' => $paymentDetails['provider_response']
            ]);
            
            $payment->save();
            
            // Update order status
            $order->update([
                'status' => 'processing',
                'payment_status' => 'completed'
            ]);
            
            // Get cart and update its status
            $cart = Cart::find($order->cart_id);
            if ($cart) {
                $cart->status = 'completed';
                $cart->save();
            }
            
            // Decrement product stock for each order item
            foreach ($order->items as $item) {
                $product = Product::find($item->product_id);
                if ($product) {
                    // Decrement stock
                    $product->stock = max(0, $product->stock - $item->quantity);
                    $product->save();
                    
                    Log::info('Product stock updated', [
                        'product_id' => $product->id,
                        'product_name' => $product->name,
                        'previous_stock' => $product->stock + $item->quantity,
                        'new_stock' => $product->stock,
                        'quantity_ordered' => $item->quantity
                    ]);
                }
            }
            
            // Send order confirmation email
            if ($order->email) {
                try {
                    // Send notification directly to the email
                    Notification::route('mail', $order->email)
                        ->notify(new OrderConfirmation($order));
                    
                    Log::info('Order confirmation email sent', [
                        'order_id' => $order->id,
                        'email' => $order->email,
                        'user_id' => Auth::id()
                    ]);
                } catch (\Exception $e) {
                    Log::error('Failed to send order confirmation email', [
                        'order_id' => $order->id,
                        'email' => $order->email,
                        'error' => $e->getMessage()
                    ]);
                }
            }
            
            // Prepare order information for confirmation page
            $orderInfo = [
                'order_id' => $order->id,
                'order_number' => $order->order_number,
                'total' => $order->total,
                'subtotal' => $order->total - $order->shipping_cost,
                'shipping_cost' => $order->shipping_cost,
                'items_count' => $order->items->count(),
                'same_as_shipping' => $order->same_as_shipping,
                'items' => $order->items->map(function($item) {
                    return [
                        'product_name' => $item->product_name,
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                        'subtotal' => $item->subtotal,
                        'total' => $item->subtotal // Add this key for template compatibility
                    ];
                })->toArray(), // Convert collection to array
                'shipping' => [
                    'name' => $order->name,
                    'email' => $order->email,
                    'phone' => $order->phone,
                    'address' => $order->address,
                    'city' => $order->city,
                    'state' => $order->state,
                    'postal_code' => $order->postal_code,
                    'country' => $order->country
                ],
                'payment_method' => 'PayPal',
                'payment_id' => $payment->payment_id,
                'date' => $order->created_at->format('F j, Y, g:i A')
            ];
            
            // Add billing information if different from shipping
            if (!$order->same_as_shipping) {
                $orderInfo['billing'] = [
                    'name' => $order->billing_name,
                    'email' => $order->billing_email,
                    'phone' => $order->billing_phone,
                    'address' => $order->billing_address,
                    'city' => $order->billing_city,
                    'state' => $order->billing_state,
                    'postal_code' => $order->billing_postal_code,
                    'country' => $order->billing_country
                ];
            }
            
            // Store order information for confirmation page
            session(['order_info' => $orderInfo, 'success' => 'Your order has been placed successfully!']);
            
            // Clear cart sessions
            session()->forget(['cart_id', 'checkout_cart_id', 'order_id']);
            
            return redirect()->route('mad-mr-bert.order-confirmation');
            
        } catch (\Exception $e) {
            Log::error('Error processing PayPal success callback', [
                'paypal_order_id' => $paypalOrderId,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return redirect()->route('mad-mr-bert.cart')
                ->with('error', 'An error occurred while processing your payment. Please contact support.');
        }
    }
    
    /**
     * Handle cancelled PayPal payment
     */
    public function paypalCancel(Request $request)
    {
        $paypalOrderId = $request->token;
        $orderId = session('order_id');
        
        Log::warning('PayPal payment cancelled by user', [
            'paypal_order_id' => $paypalOrderId,
            'order_id' => $orderId,
            'user_id' => Auth::id()
        ]);
        
        // If we have the order ID, update its status
        if ($orderId) {
            $order = Order::find($orderId);
            if ($order) {
                $order->update([
                    'status' => 'cancelled',
                    'payment_status' => 'cancelled',
                    'notes' => json_encode([
                        'cancellation_time' => now()->toIso8601String(),
                        'original_notes' => $order->notes
                    ])
                ]);
            }
        }
        
        return redirect()->route('mad-mr-bert.cart')
            ->with('warning', 'Your payment was cancelled. Your items are still in your cart if you would like to try again.');
    }
    
    // Order confirmation page
    public function orderConfirmation()
    {
        // Check if order info exists in session
        if (!session()->has('order_info')) {
            Log::warning('Order confirmation accessed without order info in session', [
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'session_id' => session()->getId()
            ]);
            
            return redirect()->route('mad-mr-bert.merchandise')
                ->with('error', 'Order information not found. Please place a new order.');
        }
        
        $orderInfo = session('order_info');
        
        // Add debug logging for order items
        if (isset($orderInfo['items'])) {
            Log::info('Order items in session', [
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'items_count' => count($orderInfo['items']),
                'items_type' => gettype($orderInfo['items']),
                'first_item' => count($orderInfo['items']) > 0 ? $orderInfo['items'][0] : null
            ]);
        } else {
            Log::error('Items key missing in order info', [
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'order_info_keys' => array_keys($orderInfo)
            ]);
        }
        
        // Validate that orderInfo is actually an array with required keys
        if (!is_array($orderInfo) || 
            !isset($orderInfo['shipping']) || 
            !isset($orderInfo['items']) || 
            !isset($orderInfo['total'])) {
                
            Log::error('Invalid order info structure in session', [
                'user_id' => Auth::check() ? Auth::id() : 'guest',
                'orderInfo' => $orderInfo
            ]);
            
            return redirect()->route('mad-mr-bert.merchandise')
                ->with('error', 'Invalid order information. Please try again.');
        }
        
        // Clear the session after retrieving the data to prevent re-access
        session()->forget('order_info');
        session()->forget('success');
        
        return view('mad-mr-bert.order-confirmation', [
            'orderInfo' => $orderInfo
        ]);
    }
    
    // Helper method to get current cart
    private function getCart($withItems = false)
    {
        // If user is logged in, get cart by user_id
        if (Auth::check()) {
            $cart = Cart::firstOrCreate(
                ['user_id' => Auth::id(), 'status' => 'active'],
                [
                    'session_id' => session()->getId(),
                    'total' => 0
                ]
            );
            
            // If there was a session cart, merge it
            if (session()->has('cart_id')) {
                $sessionCart = Cart::find(session('cart_id'));
                if ($sessionCart && $sessionCart->id != $cart->id) {
                    foreach ($sessionCart->items as $item) {
                        $existingItem = $cart->items()->where('product_id', $item->product_id)->first();
                        
                        if ($existingItem) {
                            $existingItem->quantity += $item->quantity;
                            $existingItem->save();
                        } else {
                            $item->cart_id = $cart->id;
                            $item->save();
                        }
                    }
                    
                    $cart->calculateTotal();
                    $sessionCart->delete();
                }
                
                session()->forget('cart_id');
            }
            
            // Ensure session_id is set
            if (empty($cart->session_id)) {
                $cart->session_id = session()->getId();
                $cart->save();
            }
            
            if ($withItems) {
                $cart->load('items.product');
            }
            
            return $cart;
        }
        
        // For guest users, use session to track cart
        if (session()->has('cart_id')) {
            $cart = Cart::find(session('cart_id'));
            if ($cart) {
                // Ensure session_id is up to date
                if (empty($cart->session_id) || $cart->session_id !== session()->getId()) {
                    $cart->session_id = session()->getId();
                    $cart->save();
                }
                
                if ($withItems) {
                    $cart->load('items.product');
                }
                return $cart;
            }
        }
        
        // Create new cart for guest with proper session ID
        $cart = Cart::create([
            'session_id' => session()->getId(),
            'total' => 0,
            'status' => 'active'
        ]);
        
        session(['cart_id' => $cart->id]);
        
        if ($withItems) {
            $cart->load('items.product');
        }
        return $cart;
    }
    
    /**
     * Convert country name to ISO country code for PayPal
     * 
     * @param string $countryName
     * @return string
     */
    private function getCountryCode($countryName)
    {
        $countryMap = [
            'canada' => 'CA',
            'united states' => 'US',
            'usa' => 'US',
            'united kingdom' => 'GB',
            'uk' => 'GB',
            'australia' => 'AU',
            'new zealand' => 'NZ',
            'germany' => 'DE',
            'france' => 'FR',
            'italy' => 'IT',
            'spain' => 'ES',
            'japan' => 'JP',
            'china' => 'CN',
            'india' => 'IN',
            'brazil' => 'BR',
            'mexico' => 'MX',
            // Add more country mappings as needed
        ];
        
        $key = strtolower(trim($countryName));
        return $countryMap[$key] ?? 'US'; // Default to US if country not found
    }
}
