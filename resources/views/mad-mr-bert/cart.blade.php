@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Your Shopping Cart</h1>
            <p class="text-xl text-[rgb(255,200,200)]">Review and manage your selected items</p>
        </div>
    </div>
    <div class="absolute -bottom-1 w-full">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="text-white fill-current">
            <path d="M0,96L80,112C160,128,320,160,480,160C640,160,800,128,960,117.3C1120,107,1280,117,1360,122.7L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
        </svg>
    </div>
</div>

<!-- Main Content -->
<div class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                {{ session('success') }}
            </div>
            @endif
            
            @if(session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg shadow-sm flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                {{ session('error') }}
            </div>
            @endif
            
            @if($cart->items->count() > 0)
                <div class="bg-white rounded-xl shadow-xl overflow-hidden mb-8 transform transition-all">
                    <div class="p-6 md:p-8">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-gray-900">Your Cart Items</h2>
                            <span class="text-gray-500">{{ $cart->items->count() }} {{ Str::plural('item', $cart->items->count()) }}</span>
                        </div>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="bg-gray-50 text-gray-700">
                                        <th class="px-4 py-3 text-left font-semibold">Product</th>
                                        <th class="px-4 py-3 text-center font-semibold">Price</th>
                                        <th class="px-4 py-3 text-center font-semibold">Quantity</th>
                                        <th class="px-4 py-3 text-center font-semibold">Total</th>
                                        <th class="px-4 py-3 text-center font-semibold">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                    @foreach($cart->items as $item)
                                    <tr class="hover:bg-gray-50 transition-colors">
                                        <td class="px-4 py-4">
                                            <div class="flex items-center">
                                                <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 flex-shrink-0">
                                                    <img src="{{ $item->product->image ?? 'https://picsum.photos/100/100?random=' . $item->product_id }}" 
                                                         alt="{{ $item->product->name ?? 'Product' }}" 
                                                         class="w-full h-full object-cover">
                                                </div>
                                                <div class="ml-4">
                                                    <h3 class="font-semibold text-gray-900">{{ $item->product->name ?? 'Product #' . $item->product_id }}</h3>
                                                    <p class="text-gray-500 text-sm mt-1">{{ Str::limit($item->product->description ?? 'Product description', 50) }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-center text-gray-700">CAD ${{ number_format($item->price, 2) }}</td>
                                        <td class="px-4 py-4">
                                            <form action="{{ route('mad-mr-bert.update-cart') }}" method="POST" class="flex justify-center items-center">
                                                @csrf
                                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                                <div class="flex border border-gray-300 rounded-lg overflow-hidden">
                                                    <button type="button" class="decrement-qty px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 transition-colors focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4" />
                                                        </svg>
                                                    </button>
                                                    <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" 
                                                           class="w-12 text-center border-0 focus:ring-0 focus:outline-none py-1 px-1">
                                                    <button type="button" class="increment-qty px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-600 transition-colors focus:outline-none">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M6 12h12" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <button type="submit" class="ml-2 px-3 py-1.5 bg-gray-200 hover:bg-gray-300 rounded-lg text-sm font-medium transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                                    Update
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-4 py-4 text-center font-semibold text-gray-900">CAD ${{ number_format($item->price * $item->quantity, 2) }}</td>
                                        <td class="px-4 py-4 text-center">
                                            <form action="{{ route('mad-mr-bert.remove-item') }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                                <button type="submit" class="p-2 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-full transition-colors duration-300 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="md:w-1/2 flex-1">
                        <!-- Commented out promo code section
                        <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
                            <h3 class="text-xl font-semibold text-gray-900 mb-4">Have a Promo Code?</h3>
                            <div class="flex">
                                <input type="text" placeholder="Enter promo code" class="flex-1 border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-r-lg transition-colors duration-300">
                                    Apply
                                </button>
                            </div>
                        </div>
                        -->
                        
                        <div class="mt-6">
                            <a href="{{ route('mad-mr-bert.merchandise') }}" class="inline-flex items-center bg-white rounded-lg shadow-md px-6 py-3 text-[rgb(241,97,98)] hover:text-white hover:bg-[rgb(241,97,98)] transition-colors duration-300 group">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                </svg>
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                    
                    <div class="md:w-1/2 bg-white p-6 md:p-8 rounded-xl shadow-xl">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Order Summary</h3>
                        
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between pb-4 border-b border-gray-100">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold text-gray-900">CAD ${{ number_format($cart->total, 2) }}</span>
                            </div>
                            <div class="flex justify-between pb-4 border-b border-gray-100">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold text-gray-900">CAD ${{ number_format($cart->getShippingCost(), 2) }}</span>
                            </div>
                            <div class="pt-2">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <span class="text-xl font-bold text-[rgb(241,97,98)]">CAD ${{ number_format($cart->getTotal(), 2) }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <a href="{{ route('mad-mr-bert.checkout') }}" class="block w-full py-3 px-4 bg-gradient-to-r from-[rgb(241,97,98)] to-[rgb(200,60,60)] hover:from-[rgb(220,80,80)] hover:to-[rgb(180,50,50)] text-white text-center font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:translate-y-[-2px]">
                            Proceed to Checkout
                        </a>
                        
                        <div class="mt-6 flex items-center justify-center space-x-4 text-gray-500 text-sm">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                </svg>
                                Secure Checkout
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                Safe & Reliable
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-xl overflow-hidden p-8 text-center">
                    <div class="mb-6 relative w-24 h-24 mx-auto">
                        <div class="absolute inset-0 bg-[rgb(241,97,98)] bg-opacity-10 rounded-full flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Your Shopping Cart is Empty</h2>
                    <p class="text-gray-600 mb-8 max-w-md mx-auto">Looks like you haven't added any products to your cart yet. Check out our amazing collection of aviation gear!</p>
                    <a href="{{ route('mad-mr-bert.merchandise') }}" class="inline-block py-3 px-8 bg-gradient-to-r from-[rgb(241,97,98)] to-[rgb(200,60,60)] hover:from-[rgb(220,80,80)] hover:to-[rgb(180,50,50)] text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:translate-y-[-2px]">
                        Browse Products
                    </a>
                </div>
                
                <div class="mt-12 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white rounded-xl shadow-md p-6 flex items-start">
                        <div class="bg-[rgb(241,97,98)] bg-opacity-10 rounded-full p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a4 4 0 00-4-4H8.8a4 4 0 00-3.6 2.3L3 12v7.5a2.5 2.5 0 005 0V12a2.5 2.5 0 11-5 0v-2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Quality Products</h3>
                            <p class="text-gray-600 text-sm">All our aviation gear is carefully selected for quality and performance.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-6 flex items-start">
                        <div class="bg-[rgb(241,97,98)] bg-opacity-10 rounded-full p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Best Prices</h3>
                            <p class="text-gray-600 text-sm">We offer competitive prices on our entire collection of aviation merchandise.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-md p-6 flex items-start">
                        <div class="bg-[rgb(241,97,98)] bg-opacity-10 rounded-full p-3 mr-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[rgb(241,97,98)]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-1">Fast Shipping</h3>
                            <p class="text-gray-600 text-sm">Quick and reliable worldwide shipping on all orders.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Quantity increment/decrement functionality
    document.querySelectorAll('.increment-qty').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('input[type="number"]');
            const currentValue = parseInt(input.value);
            input.value = currentValue + 1;
        });
    });
    
    document.querySelectorAll('.decrement-qty').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.parentNode.querySelector('input[type="number"]');
            const currentValue = parseInt(input.value);
            if (currentValue > 1) {
                input.value = currentValue - 1;
            }
        });
    });
});
</script>

@endsection 