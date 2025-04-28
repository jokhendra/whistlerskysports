@extends('layouts.app')

@section('content')
{{-- Main Container --}}
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Page Header --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Booking Preview</h1>
            <p class="text-lg text-gray-600">Please review your booking details before proceeding to payment</p>
        </div>

        {{-- Content Grid Layout --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column: Booking Details --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Booking Details</h2>
                        
                        <div class="space-y-6">
                            {{-- Personal Information Section --}}
                            <div class="border-b border-gray-200 pb-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Personal Information</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{-- Name --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Name</p>
                                        <p class="text-base font-medium text-gray-900">{{ e($booking['name']) }}</p>
                                    </div>
                                    {{-- Email --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Email</p>
                                        <p class="text-base font-medium text-gray-900">{{ e($booking['email']) }}</p>
                                    </div>
                                    {{-- Primary Phone --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Primary Phone</p>
                                        <p class="text-base font-medium text-gray-900">{{ e($booking['primary_phone']) }}</p>
                                    </div>
                                    {{-- Local Contact --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Local Contact</p>
                                        <p class="text-base font-medium text-gray-900">{{ e($booking['local_phone']) }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Flight Details Section --}}
                            <div class="border-b border-gray-200 pb-6">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Flight Details</h3>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    {{-- Package Type --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Package</p>
                                        <p class="text-base font-medium text-gray-900 capitalize">{{ e($booking['package']) }}</p>
                                    </div>
                                    {{-- Preferred Date --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Preferred Date</p>
                                        <p class="text-base font-medium text-gray-900">{{ \Carbon\Carbon::parse($booking['preferred_dates'])->format('F j, Y') }}</p>
                                    </div>
                                    {{-- Sunrise Flight Option --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Sunrise Flight</p>
                                        <p class="text-base font-medium text-gray-900 capitalize">{{ e($booking['sunrise_flight']) }}</p>
                                    </div>
                                    {{-- Timezone --}}
                                    <div>
                                        <p class="text-sm text-gray-500">Timezone</p>
                                        <p class="text-base font-medium text-gray-900">{{ e($booking['timezone']) }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Additional Services Section --}}
                            <div>
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Additional Services</h3>
                                <div class="space-y-3">
                                    {{-- Video Package Option --}}
                                    @if($booking['video_package'])
                                        <div class="flex items-center text-green-600">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Video Package</span>
                                        </div>
                                    @endif

                                    {{-- Deluxe Package Option --}}
                                    @if($booking['deluxe_package'])
                                        <div class="flex items-center text-green-600">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Deluxe Package</span>
                                        </div>
                                    @endif

                                    {{-- Merchandise Package Option --}}
                                    @if($booking['merch_package'])
                                        <div class="flex items-center text-green-600">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                            <span>Merchandise Package ({{ e($booking['merch_package']) }} items)</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column: Payment Summary --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden sticky top-4">
                    <div class="p-6">
                        <h2 class="text-2xl font-semibold text-gray-900 mb-6">Payment Summary</h2>
                        
                        <div class="space-y-4">
                            {{-- Base Package Price --}}
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Base Package ({{ ucfirst(e($booking['package'])) }})</span>
                                <span class="font-medium">USD ${{ number_format($totalAmount - ($booking['video_package'] ? 90 : 0) - ($booking['deluxe_package'] ? 120 : 0) - ($booking['merch_package'] * 40) - ($booking['sunrise_flight'] === 'yes' ? 99 : 0), 2) }}</span>
                            </div>

                            {{-- Additional Services Prices --}}
                            @if($booking['video_package'])
                                <div class="flex justify-between items-center text-green-600">
                                    <span>Video Package</span>
                                    <span class="font-medium">USD $90.00</span>
                                </div>
                            @endif

                            @if($booking['deluxe_package'])
                                <div class="flex justify-between items-center text-green-600">
                                    <span>Deluxe Package</span>
                                    <span class="font-medium">USD $120.00</span>
                                </div>
                            @endif

                            @if($booking['merch_package'])
                                <div class="flex justify-between items-center text-green-600">
                                    <span>Merchandise ({{ e($booking['merch_package']) }} items)</span>
                                    <span class="font-medium">USD ${{ number_format($booking['merch_package'] * 40, 2) }}</span>
                                </div>
                            @endif

                            @if($booking['sunrise_flight'] === 'yes')
                                <div class="flex justify-between items-center text-green-600">
                                    <span>Sunrise Flight Option</span>
                                    <span class="font-medium">USD $99.00</span>
                                </div>
                            @endif

                            {{-- Total Amount --}}
                            <div class="border-t border-gray-200 my-4"></div>
                            <div class="flex justify-between items-center text-lg font-bold">
                                <span>Total Amount</span>
                                <span class="text-blue-600">USD ${{ number_format($totalAmount, 2) }}</span>
                            </div>

                            {{-- Payment Process Steps --}}
                            <div class="mt-6 bg-gray-50 rounded-xl p-4">
                                <h3 class="text-lg font-medium text-gray-900 mb-4">Payment Process</h3>
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-medium">1</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Review Details</p>
                                            <p class="text-xs text-gray-500">Check your booking information</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-medium">2</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Click PayPal Button</p>
                                            <p class="text-xs text-gray-500">Secure payment through PayPal</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-medium">3</span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">Complete Payment</p>
                                            <p class="text-xs text-gray-500">Receive confirmation email</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- PayPal Payment Section --}}
                            <div class="mt-6">
                                <div class="text-center mb-4">
                                    <p class="text-lg font-medium text-gray-900">Complete Your Payment</p>
                                    <p class="text-sm text-gray-600 mt-1">Click the PayPal button below to proceed</p>
                                </div>
                                <div class="bg-white border border-gray-200 rounded-lg p-4">
                                    {{-- PayPal Loading State --}}
                                    <div id="paypal-loading" class="w-full min-h-[150px] flex items-center justify-center">
                                        <div class="text-center text-gray-500">
                                            <svg class="animate-spin h-8 w-8 text-blue-500 mx-auto mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                            </svg>
                                            <p>Loading PayPal...</p>
                                        </div>
                                    </div>
                                    {{-- PayPal Button Container --}}
                                    <div id="paypal-button-container" class="hidden"></div>
                                </div>
                            </div>

                            {{-- Security Notice --}}
                            <div class="mt-6 text-center">
                                <div class="flex items-center justify-center text-sm text-gray-500">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                    </svg>
                                    <span>Secure payment processed by PayPal</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Hidden Elements --}}
{{-- Booking Data Storage --}}
<div id="booking-data" 
     data-total-amount="{{ e($totalAmount) }}" 
     data-booking-id="{{ e($booking['order_id'] ?? 'pending') }}" 
     class="hidden">
</div>

{{-- Hidden Form for Signature Data --}}
<form id="signature-form" class="hidden">
    <input type="hidden" name="signature_data" id="signature-data" value="{{ e(session('booking.signature_data')) }}">
</form>

{{-- Processing Indicator Overlay --}}
<div id="processing-indicator" class="hidden fixed inset-0 bg-slate-900 bg-opacity-60 flex items-center justify-center z-50">
    <div class="bg-white rounded-xl p-8 text-center max-w-sm w-full mx-4 shadow-2xl">
        <div class="mb-6">
            <div class="mx-auto w-16 h-16 bg-blue-50 rounded-full flex items-center justify-center">
                <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </div>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-3">Processing Payment</h3>
        <p class="text-gray-600 mb-6">Please wait while we process your payment securely</p>
        <div class="flex items-center justify-center text-sm text-gray-500">
            <span>Do not close this window</span>
        </div>
    </div>
</div>

@push('scripts')
{{-- PayPal SDK Integration --}}
<script src="https://www.sandbox.paypal.com/sdk/js?client-id={{ e(config('paypal.sandbox.client_id')) }}&currency=USD"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize UI elements
    const loadingElement = document.getElementById('paypal-loading');
    const buttonContainer = document.getElementById('paypal-button-container');
    const totalAmount = parseFloat(document.getElementById('booking-data').getAttribute('data-total-amount'));
    const orderId = document.getElementById('booking-data').getAttribute('data-booking-id');
    const isOrderId = orderId ? true : false;

    // UI Helper Functions
    function showProcessing() {
        document.getElementById('processing-indicator').classList.remove('hidden');
    }

    function hideProcessing() {
        document.getElementById('processing-indicator').classList.add('hidden');
    }

    function showError(message) {
        buttonContainer.innerHTML = `
            <div class="text-center text-red-600 p-4">
                <svg class="mx-auto h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <p class="mt-2">${message}</p>
            </div>
        `;
    }

    // Initialize PayPal Button
    if (typeof paypal !== 'undefined') {
        paypal.Buttons({
            // Button Style Configuration
            style: {
                layout: 'vertical',
                color: 'blue',
                shape: 'rect',
                label: 'pay',
                height: 55
            },

            // Create Order Handler
            createOrder: function(data, actions) {
                showProcessing();
                return fetch('{{ route("booking.create") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        amount: totalAmount,
                        currency: 'USD',
                        orderId: isOrderId ? null : orderId,
                    })
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.error) throw new Error(data.error);
                    window.bookingId = data.booking_id;
                    
                    return actions.order.create({
                        intent: "CAPTURE",
                        purchase_units: [{
                            amount: {
                                value: "10",
                                currency_code: "USD"
                            },
                            reference_id: data.booking_id
                        }]
                    });
                })
                .catch(error => {
                    hideProcessing();
                    console.error('Error creating booking:', error);
                    showError('Failed to create booking. Please try again.');
                });
            },

            // Payment Approval Handler
            onApprove: function(data, actions) {
                showProcessing();
                return fetch('{{ route("booking.capture-payment") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        order_id: data.orderID,
                        booking_id: window.bookingId
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(details => {
                    if (details.success) {
                        // Show success message before redirect
                        const successMessage = document.createElement('div');
                        successMessage.className = 'fixed inset-0 bg-slate-900 bg-opacity-50 flex items-center justify-center z-50';
                        successMessage.innerHTML = `
                            <div class="bg-white rounded-xl p-8 text-center max-w-sm w-full mx-4 shadow-2xl">
                                <div class="mb-6">
                                    <div class="mx-auto w-16 h-16 bg-green-50 rounded-full flex items-center justify-center">
                                        <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="text-2xl font-semibold text-gray-900 mb-3">Payment Successful</h3>
                                <p class="text-gray-600 mb-6">Your booking has been confirmed</p>
                                <div class="flex items-center justify-center text-sm text-gray-500">
                                    <span>Redirecting to confirmation page...</span>
                                </div>
                            </div>
                        `;
                        document.body.appendChild(successMessage);
                        
                        // Redirect after a short delay
                        setTimeout(() => {
                            window.location.href = '{{ route("booking.success") }}';
                        }, 2000);
                    } else {
                        hideProcessing();
                        showError('Payment failed: ' + (details.error || 'Unknown error'));
                        logPaymentFailure(data.orderID, isOrderId ? null : orderId, details.error || 'Unknown error');
                    }
                })
                .catch(error => {
                    hideProcessing();
                    console.error('Error capturing payment:', error);
                    showError('Failed to capture payment. Please try again.');
                    logPaymentFailure(data.orderID, isOrderId ? null : orderId, error.message || 'Error capturing payment');
                });
            },

            // Error Handler
            onError: function(err) {
                hideProcessing();
                console.error('PayPal error:', err);
                showError('An error occurred with PayPal. Please try again.');
                logPaymentFailure(null, isOrderId ? null : orderId, 'PayPal error: ' + (err.message || JSON.stringify(err)));
            },

            // Cancel Handler
            onCancel: function() {
                hideProcessing();
                const cancelMessage = document.createElement('div');
                cancelMessage.className = 'fixed inset-0 bg-slate-900 bg-opacity-50 flex items-center justify-center z-50';
                cancelMessage.innerHTML = `
                    <div class="bg-white rounded-xl p-8 text-center max-w-sm w-full mx-4 shadow-2xl">
                        <div class="mb-6">
                            <div class="mx-auto w-16 h-16 bg-yellow-50 rounded-full flex items-center justify-center">
                                <svg class="h-8 w-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-semibold text-gray-900 mb-3">Payment Cancelled</h3>
                        <p class="text-gray-600 mb-6">You can try again or contact support if you need help</p>
                        <button onclick="this.parentElement.parentElement.remove()" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Close
                        </button>
                    </div>
                `;
                document.body.appendChild(cancelMessage);
                logPaymentFailure(null, isOrderId ? null : orderId, 'Payment cancelled by user');
            }
        }).render('#paypal-button-container')
        .then(() => {
            loadingElement.classList.add('hidden');
            buttonContainer.classList.remove('hidden');
        })
        .catch(error => {
            console.error('PayPal button render error:', error);
            loadingElement.classList.add('hidden');
            showError('Error loading PayPal button. Please refresh the page or try again later.');
        });
    } else {
        console.error('PayPal SDK not loaded');
        loadingElement.classList.add('hidden');
        showError('Error loading PayPal. Please refresh the page or try again later.');
    }
});

// Payment Failure Logging Function
function logPaymentFailure(orderId, bookingId, errorMessage) {
    fetch('{{ route("booking.log-payment-failure") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({
            order_id: orderId,
            booking_id: window.bookingId,
            error_message: errorMessage
        })
    })
    .then(response => {
        if (!response.ok) {
            console.error('Failed to log payment failure to backend');
        }
        return response.json();
    })
    .then(data => {
        console.log('Payment failure logged:', data);
    })
    .catch(error => {
        console.error('Error logging payment failure:', error);
    });
}
</script>
@endpush
@endsection 