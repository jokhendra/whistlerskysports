@extends('admin.layout.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Orders</h2>
            <p class="mt-1 text-sm text-gray-600">Manage all customer orders</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.orders.export') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                Export CSV
            </a>
        </div>
    </div>
    
    <!-- Filter Form -->
    <div class="bg-white shadow rounded-lg mb-6 p-4 sm:p-6">
        <h3 class="text-lg font-medium text-gray-900 mb-4">Filters</h3>
        
        <form method="GET" action="{{ route('admin.orders.index') }}" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div>
                <label for="order_number" class="block text-sm font-medium text-gray-700 mb-1">Order Number</label>
                <input type="text" name="order_number" id="order_number" value="{{ request('order_number') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200 text-gray-900 placeholder-gray-500">
            </div>
            
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <div class="relative">
                    <select name="status" id="status" class="appearance-none w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200 bg-white pr-10 cursor-pointer hover:border-[#204fb4]/50">
                        <option value="">All Statuses</option>
                        @foreach($statuses as $value => $label)
                            <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div>
                <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-1">Payment Status</label>
                <div class="relative">
                    <select name="payment_status" id="payment_status" class="appearance-none w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200 bg-white pr-10 cursor-pointer hover:border-[#204fb4]/50">
                        <option value="">All Payment Statuses</option>
                        @foreach($paymentStatuses as $value => $label)
                            <option value="{{ $value }}" {{ request('payment_status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>
            </div>
            
            <div>
                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Date From</label>
                <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
            </div>
            
            <div>
                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Date To</label>
                <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
            </div>
            
            <div>
                <label for="customer" class="block text-sm font-medium text-gray-700 mb-1">Customer (Name/Email)</label>
                <input type="text" name="customer" id="customer" value="{{ request('customer') }}" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200 text-gray-900 placeholder-gray-500">
            </div>
            
            <div class="col-span-1 md:col-span-2 lg:col-span-3 flex items-end justify-end space-x-2">
                @if(request()->anyFilled(['order_number', 'status', 'payment_status', 'date_from', 'date_to', 'customer']))
                    <a href="{{ route('admin.orders.index') }}" class="px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:border-gray-500 focus:ring ring-gray-200 disabled:opacity-25 transition ease-in-out duration-150">
                        Clear Filters
                    </a>
                @endif
                
                <button type="submit" class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Apply Filters
                </button>
            </div>
        </form>
    </div>

    <!-- Orders Table -->
    <div class="flex flex-col bg-white shadow rounded-lg">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    @if($orders->isEmpty())
                        <div class="p-6 text-center">
                            <p class="text-gray-500">No orders found.</p>
                        </div>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order #
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Customer
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Payment
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Items
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $order->order_number }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $order->created_at->format('M d, Y H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <div>{{ $order->name }}</div>
                                            <div class="text-xs text-gray-400">{{ $order->email }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            CAD ${{ number_format($order->total, 2) }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($order->status == 'pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            @elseif($order->status == 'processing')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                    Processing
                                                </span>
                                            @elseif($order->status == 'shipped')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                                    Shipped
                                                </span>
                                            @elseif($order->status == 'completed')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Completed
                                                </span>
                                            @elseif($order->status == 'cancelled')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Cancelled
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($order->payment_status == 'pending')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    Pending
                                                </span>
                                            @elseif($order->payment_status == 'completed')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    Completed
                                                </span>
                                            @elseif($order->payment_status == 'failed')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                    Failed
                                                </span>
                                            @elseif($order->payment_status == 'refunded')
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    Refunded
                                                </span>
                                            @else
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                    {{ ucfirst($order->payment_status) }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $order->items->count() }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('admin.orders.show', $order->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <!-- Pagination -->
    <div class="mt-4">
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200 rounded-b-lg">
            <div class="flex flex-col sm:flex-row items-center justify-between">
                <div class="mb-4 sm:mb-0 text-sm text-gray-500">
                    Showing 
                    <span class="font-semibold">{{ $orders->firstItem() ?? 0 }}</span> 
                    to 
                    <span class="font-semibold">{{ $orders->lastItem() ?? 0 }}</span> 
                    of 
                    <span class="font-semibold">{{ $orders->total() }}</span> 
                    orders
                </div>
                
                <div class="flex flex-col md:flex-row items-center">
                    <div class="mr-4 mb-3 md:mb-0">
                        <label for="per-page" class="sr-only">Per Page</label>
                        <select id="per-page" onchange="window.location.href=this.value" class="block w-full rounded-md border-gray-300 py-1.5 text-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @foreach([10, 25, 50, 100] as $perPage)
                                <option value="{{ request()->fullUrlWithQuery(['perPage' => $perPage]) }}" 
                                        {{ request('perPage', 10) == $perPage ? 'selected' : '' }}>
                                    {{ $perPage }} per page
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="flex items-center">
                        @if($orders->onFirstPage())
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-not-allowed rounded-l-md">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Previous
                            </span>
                        @else
                            <a href="{{ $orders->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Previous
                            </a>
                        @endif
                        
                        <div class="hidden sm:flex mx-2">
                            {{ $orders->onEachSide(1)->links() }}
                        </div>
                        
                        @if($orders->hasMorePages())
                            <a href="{{ $orders->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                                Next
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-not-allowed rounded-r-md">
                                Next
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 