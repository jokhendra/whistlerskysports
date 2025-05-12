@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Total Bookings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Total Bookings</h2>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['total_bookings'] }}</p>
                        <p class="text-sm text-gray-500">All time</p>
                    </div>
                </div>
            </div>

            <!-- Today's Revenue -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Today's Revenue</h2>
                        <p class="text-2xl font-semibold text-gray-900">${{ number_format($stats['today_revenue'], 2) }}</p>
                        <p class="text-sm {{ $stats['revenue_change'] >= 0 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $stats['revenue_change'] >= 0 ? '+' : '' }}{{ $stats['revenue_change'] }}% vs yesterday
                        </p>
                    </div>
                </div>
            </div>

            <!-- Pending Bookings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Pending Bookings</h2>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['pending_bookings'] }}</p>
                        <p class="text-sm text-yellow-600">Require attention</p>
                    </div>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-600">Conversion Rate</h2>
                        <p class="text-2xl font-semibold text-gray-900">{{ $stats['conversion_rate'] }}%</p>
                        <p class="text-sm text-purple-600">Confirmed/Total</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">
                    @if($filter)
                        {{ ucfirst($filter) }} Bookings
                    @else
                        All Bookings
                    @endif
                </h2>
                <p class="mt-1 text-sm text-gray-600">
                    Showing {{ $bookings->firstItem() ?? 0 }} to {{ $bookings->lastItem() ?? 0 }} of {{ $bookings->total() }} bookings
                </p>
            </div>
            <div class="flex space-x-3">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            class="inline-flex items-center px-4 py-2 bg-white rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Export
                        <svg class="h-4 w-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open"
                         @click.away="open = false"
                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">
                        <div class="py-1">
                            <a href="{{ route('admin.bookings.export', array_merge(
                                request()->query(),
                                ['filter' => $filter]
                            )) }}" 
                               class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg class="h-4 w-4 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Export as CSV
                            </a>
                            <!-- <a href="{{ route('admin.bookings.export', ['format' => 'excel']) }}" 
                               class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <svg class="h-4 w-4 mr-3 text-gray-400 group-hover:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                </svg>
                                Export as Excel
                            </a> -->
                        </div>
                    </div>
                </div>
                <a href="#" class="inline-flex items-center px-4 py-2 bg-white rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Calendar View
                </a>
                <a href="#" class="inline-flex items-center px-4 py-2 bg-white rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Sheet View
                </a>
            </div>
        </div>

        <!-- Advanced Search -->
        <div class="bg-white rounded-lg shadow-sm mb-6">
            <div class="p-4 border-b border-gray-200">
                <div class="flex items-center mb-4">
                    <svg class="h-5 w-5 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900">Advanced Search</h3>
                </div>

                <form action="{{ route('admin.bookings.index') }}" method="GET" class="space-y-6">
                    <!-- Basic Search with Icon -->
                    <div class="max-w-3xl mx-auto">
                        <div class="relative">
                            <input type="text" 
                                   name="search" 
                                   placeholder="Search by name, email, phone or package..." 
                                   value="{{ request('search') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 pl-10 py-3 text-gray-900 placeholder-gray-500">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Filters Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Date Range Group -->
                        <div class="space-y-4 bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-900 flex items-center">
                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                Date Range
                            </h4>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label for="date_from" class="text-sm font-medium text-gray-700 mb-1 block">From</label>
                                    <input type="date" 
                                           id="date_from" 
                                           name="date_from" 
                                           value="{{ request('date_from') }}"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>
                                <div>
                                    <label for="date_to" class="block text-sm font-medium text-gray-700">To</label>
                                    <input type="date" 
                                           id="date_to" 
                                           name="date_to" 
                                           value="{{ request('date_to') }}"
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">
                                </div>
                            </div>
                        </div>

                        <!-- Package Type -->
                        <div class="space-y-4 bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-900 flex items-center">
                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                                Package Type
                            </h4>
                            <div class="relative">
                                <select id="package" 
                                        name="package" 
                                        class="appearance-none w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200 bg-white pr-10 cursor-pointer hover:border-[#204fb4]/50">
                                    <option value="">All Packages</option>
                                    <option value="intro" {{ request('package') === 'intro' ? 'selected' : '' }} class="py-2">
                                        <span class="font-medium">Intro Package</span>
                                        <span class="text-gray-500 text-sm"> - First time flyers</span>
                                    </option>
                                    <option value="basic" {{ request('package') === 'basic' ? 'selected' : '' }} class="py-2">
                                        <span class="font-medium">Basic Package</span>
                                        <span class="text-gray-500 text-sm"> - Standard flight</span>
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Add-ons Filter -->
                        <div class="space-y-4 bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-900 flex items-center">
                                <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add-ons
                            </h4>
                            <div class="space-y-3">
                                <label class="relative flex items-start cursor-pointer group">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" 
                                               name="has_video" 
                                               value="1" 
                                               {{ request('has_video') ? 'checked' : '' }}
                                               class="h-4 w-4 rounded border-gray-300 text-[#204fb4] focus:ring-[#204fb4]/20 transition duration-150 ease-in-out">
                                    </div>
                                    <div class="ml-3 flex items-center">
                                        <svg class="h-5 w-5 text-[#204fb4] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2z" />
                                        </svg>
                                        <span class="text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Video Package</span>
                                    </div>
                                </label>

                                <label class="relative flex items-start cursor-pointer group">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" 
                                               name="has_deluxe" 
                                               value="1" 
                                               {{ request('has_deluxe') ? 'checked' : '' }}
                                               class="h-4 w-4 rounded border-gray-300 text-[#204fb4] focus:ring-[#204fb4]/20 transition duration-150 ease-in-out">
                                    </div>
                                    <div class="ml-3 flex items-center">
                                        <svg class="h-5 w-5 text-[#204fb4] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                        </svg>
                                        <span class="text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Deluxe Package</span>
                                    </div>
                                </label>

                                <label class="relative flex items-start cursor-pointer group">
                                    <div class="flex items-center h-5">
                                        <input type="checkbox" 
                                               name="has_merch" 
                                               value="1" 
                                               {{ request('has_merch') ? 'checked' : '' }}
                                               class="h-4 w-4 rounded border-gray-300 text-[#204fb4] focus:ring-[#204fb4]/20 transition duration-150 ease-in-out">
                                    </div>
                                    <div class="ml-3 flex items-center">
                                        <svg class="h-5 w-5 text-[#204fb4] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                        <span class="text-sm text-gray-700 group-hover:text-gray-900 transition-colors">Merchandise</span>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                        <button type="reset" 
                                class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-4 w-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                            </svg>
                            Reset Filters
                        </button>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            Search
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Status Filters -->
        <div class="bg-white rounded-lg shadow-sm mb-6">
            <div class="p-4 border-b border-gray-200">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <!-- Status Filters -->
                    <div class="flex space-x-2">
                        <a href="{{ route('admin.bookings.index') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ !$filter ? 'bg-blue-100 text-blue-700' : 'text-gray-500 hover:text-gray-700' }}">
                            All
                        </a>
                        <a href="{{ route('admin.bookings.filter', 'today') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ $filter === 'today' ? 'bg-blue-100 text-blue-700' : 'text-gray-500 hover:text-gray-700' }}">
                            Today
                        </a>
                        <a href="{{ route('admin.bookings.filter', 'pending') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ $filter === 'pending' ? 'bg-yellow-100 text-yellow-700' : 'text-gray-500 hover:text-gray-700' }}">
                            Pending
                            @if($stats['pending_bookings'] > 0)
                                <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    {{ $stats['pending_bookings'] }}
                                </span>
                            @endif
                        </a>
                        <a href="{{ route('admin.bookings.filter', 'confirmed') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ $filter === 'confirmed' ? 'bg-green-100 text-green-700' : 'text-gray-500 hover:text-gray-700' }}">
                            Confirmed
                        </a>
                        <a href="{{ route('admin.bookings.filter', 'canceled') }}" 
                           class="px-3 py-2 rounded-md text-sm font-medium {{ $filter === 'canceled' ? 'bg-red-100 text-red-700' : 'text-gray-500 hover:text-gray-700' }}">
                            Canceled
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bookings Table -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="min-w-full divide-y divide-gray-200">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Booking Details
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Flight Information
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Package & Add-ons
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status & Payment
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($bookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-gray-100 rounded-full flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $booking->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $booking->email }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $booking->primary_phone }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">
                                        {{ $booking->preferred_dates->format('M d, Y') }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $booking->sunrise_flight ? 'Sunrise Flight' : 'Regular Flight' }}
                                    </div>
                                    @if($booking->flying_time && $booking->flying_status === 'confirmed')
                                    <div class="text-sm font-medium text-green-600 mt-1">
                                        <svg class="inline-block h-4 w-4 mr-1 -mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Scheduled: {{ \Carbon\Carbon::parse($booking->flying_time)->format('M d, Y g:i A') }}
                                    </div>
                                    @endif
                                    <div class="text-sm text-gray-500">
                                        Weight: {{ $booking->weight }} kg
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ ucfirst($booking->package) }}</div>
                                    <div class="flex flex-wrap gap-2 mt-1">
                                        @if($booking->video_package)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2z" />
                                                </svg>
                                                Video
                                            </span>
                                        @endif
                                        @if($booking->deluxe_package)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800">
                                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                                </svg>
                                                Deluxe
                                            </span>
                                        @endif
                                        @if($booking->merch_package)
                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-indigo-100 text-indigo-800">
                                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                                </svg>
                                                Merch
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        {{ $booking->flying_status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->flying_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($booking->flying_status) }}
                                        @if($booking->flying_status === 'canceled' && $booking->cancellation_reason)
                                        <span class="ml-1 cursor-help group relative" x-data="{ showTooltip: false }" @mouseenter="showTooltip = true" @mouseleave="showTooltip = false">
                                            <svg class="h-3.5 w-3.5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <div x-show="showTooltip" class="absolute z-10 bottom-full left-1/2 transform -translate-x-1/2 -translate-y-1 w-48 bg-gray-900 text-white text-xs rounded py-1 px-2">
                                                <div class="text-left">{{ $booking->cancellation_reason }}</div>
                                                <div class="absolute left-1/2 transform -translate-x-1/2 top-full w-0 h-0 border-l-4 border-r-4 border-t-4 border-transparent border-t-gray-900"></div>
                                            </div>
                                        </span>
                                        @endif
                                    </span>
                                    <div class="mt-1 text-sm font-medium text-gray-900">
                                        ${{ number_format($booking->total_amount, 2) }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        Created {{ $booking->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium">
                                    <div class="flex flex-col space-y-2">
                                        <a href="{{ route('admin.bookings.show', $booking->id) }}" class="inline-flex items-center text-blue-600 hover:text-blue-900">
                                            <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            View
                                        </a>
                                        @if($booking->flying_status === 'pending')
                                            <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="confirmed">
                                                <button type="submit" class="inline-flex items-center text-green-600 hover:text-green-900">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                    </svg>
                                                    Confirm
                                                </button>
                                            </form>
                                        @endif
                                        @if($booking->flying_status !== 'canceled')
                                            <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="canceled">
                                                <button type="submit" class="inline-flex items-center text-red-600 hover:text-red-900">
                                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                    Cancel
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                    <div class="flex flex-col items-center justify-center py-8">
                                        <svg class="h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                        <p class="text-gray-600 mb-2">No bookings found</p>
                                        @if(request('search'))
                                            <p class="text-sm text-gray-500">Try adjusting your search criteria</p>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="bg-white px-6 py-3 border-t border-gray-200 sm:px-6">
                <div class="flex flex-col sm:flex-row items-center justify-between">
                    <div class="mb-4 sm:mb-0 text-sm text-gray-500">
                        Showing 
                        <span class="font-semibold">{{ $bookings->firstItem() ?? 0 }}</span> 
                        to 
                        <span class="font-semibold">{{ $bookings->lastItem() ?? 0 }}</span> 
                        of 
                        <span class="font-semibold">{{ $bookings->total() }}</span> 
                        bookings
                    </div>
                    
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="mr-4 mb-3 md:mb-0">
                            <label for="per-page" class="sr-only">Per Page</label>
                            <select id="per-page" onchange="window.location.href=this.value" class="block w-full rounded-md border-gray-300 py-1.5 text-sm focus:border-blue-500 focus:ring-blue-500">
                                @foreach([10, 25, 50, 100] as $perPage)
                                    <option value="{{ request()->fullUrlWithQuery(['perPage' => $perPage]) }}" 
                                            {{ request('perPage', 10) == $perPage ? 'selected' : '' }}>
                                        {{ $perPage }} per page
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="flex items-center">
                            @if($bookings->onFirstPage())
                                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 cursor-not-allowed rounded-l-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Previous
                                </span>
                            @else
                                <a href="{{ $bookings->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                    </svg>
                                    Previous
                                </a>
                            @endif
                            
                            <div class="hidden sm:flex mx-2">
                                {{ $bookings->onEachSide(1)->links() }}
                            </div>
                            
                            @if($bookings->hasMorePages())
                                <a href="{{ $bookings->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
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
</div>

@if(session('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed bottom-4 right-4 bg-green-50 p-4 rounded-lg shadow-lg border border-green-200">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    {{ session('success') }}
                </p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <button @click="show = false" class="bg-green-50 rounded-md inline-flex text-green-500 hover:text-green-600 focus:outline-none">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
@endif

@push('scripts')
<script>
    // Confirm booking cancellation
    document.querySelectorAll('form').forEach(form => {
        if (form.querySelector('input[value="canceled"]')) {
            form.addEventListener('submit', function(e) {
                if (!confirm('Are you sure you want to cancel this booking?')) {
                    e.preventDefault();
                }
            });
        }
    });
</script>
@endpush
@endsection 
 