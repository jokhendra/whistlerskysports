@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">Welcome back, {{ Auth::guard('admin')->user()->name }}!</h2>
            <p class="mt-1 text-gray-600">Here's what's happening with your business today.</p>
        </div>

        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Total Bookings -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $stats['total_bookings'] }}</h3>
                        <p class="text-sm text-gray-500">Total Bookings</p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-green-600">
                            +{{ $stats['recent_bookings']->count() }} new
                        </span>
                        <span class="text-sm text-gray-500">Last 24h</span>
                    </div>
                </div>
            </div>

            <!-- Monthly Revenue -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">${{ number_format($stats['monthly_revenue'], 2) }}</h3>
                        <p class="text-sm text-gray-500">Monthly Revenue</p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-green-600">
                            ${{ number_format($stats['yearly_revenue'] / 12, 2) }} avg
                        </span>
                        <span class="text-sm text-gray-500">Per Month</span>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $stats['total_users'] }}</h3>
                        <p class="text-sm text-gray-500">Total Users</p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-green-600">Active</span>
                        <span class="text-sm text-gray-500">All Time</span>
                    </div>
                </div>
            </div>

            <!-- Total Contacts -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-medium text-gray-900">{{ $stats['total_contacts'] }}</h3>
                        <p class="text-sm text-gray-500">Total Contacts</p>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-green-600">
                            +{{ $stats['recent_contacts']->count() }} new
                        </span>
                        <span class="text-sm text-gray-500">Last 24h</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weather Information -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Weather Conditions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Current Weather -->
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Current Conditions</p>
                            <h4 class="text-2xl font-semibold text-gray-800 mt-1">{{ $weather['current_temp'] }}°C</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ $weather['conditions'] }}</p>
                        </div>
                        <div class="text-blue-500">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4 grid grid-cols-3 gap-2 text-center">
                        <div>
                            <p class="text-xs text-gray-500">Wind</p>
                            <p class="text-sm font-medium text-gray-800">{{ $weather['wind_speed'] }} km/h</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Humidity</p>
                            <p class="text-sm font-medium text-gray-800">{{ $weather['humidity'] }}%</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Visibility</p>
                            <p class="text-sm font-medium text-gray-800">{{ $weather['visibility'] }} km</p>
                        </div>
                    </div>
                </div>

                <!-- Weather Alerts -->
                <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 rounded-lg p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Weather Alerts</p>
                            <h4 class="text-lg font-medium text-gray-800 mt-1">Active Alerts</h4>
                        </div>
                        <div class="text-yellow-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        @forelse($weather['alerts'] as $alert)
                            <div class="bg-white bg-opacity-50 rounded p-2 mb-2">
                                <p class="text-sm font-medium text-gray-800">{{ $alert['title'] }}</p>
                                <p class="text-xs text-gray-600">{{ $alert['description'] }}</p>
                            </div>
                        @empty
                            <p class="text-sm text-gray-600">No active weather alerts</p>
                        @endforelse
                    </div>
                </div>

                <!-- Forecast -->
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-lg p-4">
                    <div class="flex items-center justify-between mb-4">
                        <p class="text-sm text-gray-600">3-Day Forecast</p>
                        <div class="text-green-500">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                    @foreach($weather['forecast'] as $day)
                        <div class="flex items-center justify-between mb-2 bg-white bg-opacity-50 rounded p-2">
                            <span class="text-sm text-gray-600">{{ $day['date'] }}</span>
                            <span class="text-sm font-medium text-gray-800">{{ $day['high'] }}°C / {{ $day['low'] }}°C</span>
                            <span class="text-sm text-gray-600">{{ $day['conditions'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Recent Activity Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Bookings -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Recent Bookings</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse($stats['recent_bookings'] as $booking)
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <span class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-sm font-medium text-gray-900">
                                            {{ $booking->name ?? 'Guest User' }}
                                        </h4>
                                        <p class="text-sm text-gray-500">
                                            {{ $booking->created_at->format('M d, Y H:i') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                                           ($booking->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                                           'bg-red-100 text-red-800') }}">
                                        {{ ucfirst($booking->status) }}
                                    </span>
                                    <p class="mt-1 text-sm text-gray-500">${{ number_format($booking->total_amount, 2) }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            No recent bookings
                        </div>
                    @endforelse
                </div>
                <div class="bg-gray-50 px-6 py-4 rounded-b-lg">
                    <a href="{{ route('admin.bookings.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                        View all bookings →
                    </a>
                </div>
            </div>

            <!-- Recent Contacts -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-900">Recent Contacts</h3>
                </div>
                <div class="divide-y divide-gray-200">
                    @forelse($stats['recent_contacts'] as $contact)
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <span class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </span>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">{{ $contact->name }}</h4>
                                    <p class="text-sm text-gray-500">{{ $contact->email }}</p>
                                    <p class="mt-1 text-sm text-gray-500">{{ Str::limit($contact->message, 100) }}</p>
                                    <p class="mt-1 text-xs text-gray-400">{{ $contact->created_at->format('M d, Y H:i') }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="p-6 text-center text-gray-500">
                            No recent contacts
                        </div>
                    @endforelse
                </div>
                <div class="bg-gray-50 px-6 py-4 rounded-b-lg">
                    <a href="{{ route('admin.contacts.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                        View all contacts →
                    </a>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Quick Actions</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="{{ route('admin.bookings.index', ['filter' => 'pending']) }}" 
                   class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-yellow-100 rounded-md p-3">
                            <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-base font-medium text-gray-900">Pending Bookings</p>
                            <p class="text-sm text-gray-500">Review and confirm</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.promotional-emails.index') }}" 
                   class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-blue-100 rounded-md p-3">
                            <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-base font-medium text-gray-900">Send Newsletter</p>
                            <p class="text-sm text-gray-500">Promote your services</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.reviews.index') }}" 
                   class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-green-100 rounded-md p-3">
                            <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-base font-medium text-gray-900">Manage Reviews</p>
                            <p class="text-sm text-gray-500">View and respond</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('admin.settings.index') }}" 
                   class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-purple-100 rounded-md p-3">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-base font-medium text-gray-900">Settings</p>
                            <p class="text-sm text-gray-500">Configure system</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

