@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Order Confirmed!</h1>
            <p class="text-xl text-[rgb(255,200,200)]">Thank you for your purchase</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden p-8">
                <div class="text-center mb-8">
                    <div class="mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Order Successfully Placed!</h2>
                    <p class="text-gray-600 mb-4">Thank you for your order. We've received your purchase request and are getting it ready to ship.</p>
                    <p class="text-gray-600 mb-8">A confirmation email has been sent to your email address.</p>
                </div>
                
                @if(isset($orderInfo))
                <div class="border-t border-b border-gray-200 py-8 mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Order Details</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Shipping Information -->
                        <div>
                            <h4 class="text-gray-700 font-bold mb-2">Shipping Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="mb-1">{{ $orderInfo['shipping']['name'] ?? 'Name not provided' }}</p>
                                <p class="mb-1">{{ $orderInfo['shipping']['email'] ?? 'Email not provided' }}</p>
                                @if(isset($orderInfo['shipping']['phone']) && !empty($orderInfo['shipping']['phone']))
                                <p class="mb-1">Phone: {{ $orderInfo['shipping']['phone'] }}</p>
                                @endif
                                <p class="mb-1">{{ $orderInfo['shipping']['address'] ?? 'Address not provided' }}</p>
                                <p class="mb-1">
                                    {{ $orderInfo['shipping']['city'] ?? 'City not provided' }}
                                    @if(isset($orderInfo['shipping']['state']) && !empty($orderInfo['shipping']['state']))
                                    , {{ $orderInfo['shipping']['state'] }}
                                    @endif
                                    {{ $orderInfo['shipping']['postal_code'] ?? 'Postal code not provided' }}
                                </p>
                                @if(isset($orderInfo['shipping']['country']) && !empty($orderInfo['shipping']['country']))
                                <p class="mb-1">{{ $orderInfo['shipping']['country'] }}</p>
                                @endif
                            </div>
                            
                            @if(isset($orderInfo['billing']) && !$orderInfo['same_as_shipping'])
                            <h4 class="text-gray-700 font-bold mb-2 mt-4">Billing Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="mb-1">{{ $orderInfo['billing']['name'] ?? 'Name not provided' }}</p>
                                <p class="mb-1">{{ $orderInfo['billing']['email'] ?? 'Email not provided' }}</p>
                                @if(isset($orderInfo['billing']['phone']) && !empty($orderInfo['billing']['phone']))
                                <p class="mb-1">Phone: {{ $orderInfo['billing']['phone'] }}</p>
                                @endif
                                <p class="mb-1">{{ $orderInfo['billing']['address'] ?? 'Address not provided' }}</p>
                                <p class="mb-1">
                                    {{ $orderInfo['billing']['city'] ?? 'City not provided' }}
                                    @if(isset($orderInfo['billing']['state']) && !empty($orderInfo['billing']['state']))
                                    , {{ $orderInfo['billing']['state'] }}
                                    @endif
                                    {{ $orderInfo['billing']['postal_code'] ?? 'Postal code not provided' }}
                                </p>
                                @if(isset($orderInfo['billing']['country']) && !empty($orderInfo['billing']['country']))
                                <p class="mb-1">{{ $orderInfo['billing']['country'] }}</p>
                                @endif
                            </div>
                            @endif
                        </div>
                        
                        <!-- Payment Information -->
                        <div>
                            <h4 class="text-gray-700 font-bold mb-2">Payment Information</h4>
                            <div class="bg-gray-50 p-4 rounded">
                                <p class="mb-1">
                                    <span class="font-medium">Method:</span> 
                                    {{ $orderInfo['payment_method'] ?? 'Not specified' }}
                                </p>
                                @if(isset($orderInfo['payment_id']) && !empty($orderInfo['payment_id']))
                                <p class="mb-1">
                                    <span class="font-medium">Transaction ID:</span> 
                                    {{ $orderInfo['payment_id'] }}
                                </p>
                                @endif
                                @if(isset($orderInfo['date']) && !empty($orderInfo['date']))
                                <p class="mb-1">
                                    <span class="font-medium">Date:</span> 
                                    {{ $orderInfo['date'] }}
                                </p>
                                @endif
                                <p class="mb-1"><span class="font-medium">Items:</span> {{ $orderInfo['items_count'] ?? 0 }}</p>
                                <p class="mb-1">
                                    <span class="font-medium">Subtotal:</span> 
                                    <span>${{ number_format($orderInfo['subtotal'] ?? 0, 2) }}</span>
                                </p>
                                <p class="mb-1">
                                    <span class="font-medium">Shipping:</span> 
                                    <span>${{ number_format($orderInfo['shipping_cost'] ?? 0.00, 2) }}</span>
                                </p>
                                <p class="mt-2 font-bold">
                                    <span>Total:</span> 
                                    <span class="text-[rgb(241,97,98)]">${{ number_format($orderInfo['total'] ?? 0, 2) }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Items -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Purchased Items</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-4 py-2 text-left">Product</th>
                                    <th class="px-4 py-2 text-center">Price</th>
                                    <th class="px-4 py-2 text-center">Quantity</th>
                                    <th class="px-4 py-2 text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($orderInfo['items']) && is_array($orderInfo['items']) && count($orderInfo['items']) > 0)
                                    @foreach($orderInfo['items'] as $item)
                                        @if(is_array($item))
                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ $item['product_name'] ?? 'Product' }}</td>
                                            <td class="px-4 py-3 text-center">${{ number_format($item['price'] ?? 0, 2) }}</td>
                                            <td class="px-4 py-3 text-center">{{ $item['quantity'] ?? 1 }}</td>
                                            <td class="px-4 py-3 text-right font-medium">${{ number_format($item['total'] ?? $item['subtotal'] ?? 0, 2) }}</td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="px-4 py-3 text-center text-gray-500">No items found</td>
                                    </tr>
                                @endif
                            </tbody>
                            <tfoot class="bg-gray-50">
                                <tr>
                                    <td colspan="3" class="px-4 py-3 text-right font-bold">Grand Total:</td>
                                    <td class="px-4 py-3 text-right font-bold">${{ number_format($orderInfo['total'] ?? 0, 2) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @endif
                
                <div class="text-center">
                    <a href="{{ route('mad-mr-bert.merchandise') }}" class="inline-block py-3 px-6 bg-[rgb(241,97,98)] hover:bg-[rgb(200,60,60)] text-white font-semibold rounded-lg transition-colors duration-300">
                        Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
