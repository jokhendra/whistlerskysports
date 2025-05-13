@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header with Back Button -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-3xl font-bold text-gray-800">Booking #{{ $booking->id }}</h2>
                <p class="mt-1 text-sm text-gray-600 flex items-center">
                    <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Created {{ $booking->created_at->format('M d, Y H:i') }}
                    <span class="mx-2">•</span>
                    <svg class="h-4 w-4 mr-1 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    {{ $booking->name }}
                </p>
            </div>
            <div class="flex space-x-3">
                <a href="{{ url()->previous() }}" class="inline-flex items-center px-4 py-2 bg-white rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 border border-gray-300 transition-all duration-200">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to List
                </a>
                @if($booking->flying_status === 'pending')
                    <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST" class="inline" x-data="{ showDateTimePicker: false }">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="confirmed">
                        
                        <button type="button" @click="showDateTimePicker = true" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Confirm Booking
                        </button>
                        
                        <!-- Date and Time Picker Modal -->
                        <div x-show="showDateTimePicker" class="fixed inset-0 overflow-y-auto z-50" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <!-- Background overlay -->
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                
                                <!-- Modal panel -->
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Schedule Flight Date and Time
                                                </h3>
                                                <div class="mt-4">
                                                    <p class="text-sm text-gray-500 mb-4">
                                                        Please select the date and time for this flight. A confirmation email will be sent to the customer.
                                                    </p>
                                                    
                                                    <div class="mb-4">
                                                        <label for="flying_time" class="block text-sm font-medium text-gray-700 mb-1">Flight Date and Time</label>
                                                        <input type="datetime-local" 
                                                               id="flying_time" 
                                                               name="flying_time" 
                                                               value="{{ old('flying_time', $booking->flying_time ? date('Y-m-d\TH:i', strtotime($booking->flying_time)) : date('Y-m-d\TH:i', strtotime('+3 days'))) }}" 
                                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                               required>
                                                        <p class="mt-1 text-xs text-gray-500">Select the date and time for the flight in the format YYYY-MM-DD HH:MM</p>
                                                    </div>
                                                    
                                                    @if($errors->has('flying_time'))
                                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('flying_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Confirm and Schedule
                                        </button>
                                        <button type="button" @click="showDateTimePicker = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
                @if($booking->flying_status !== 'canceled')
                    <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST" class="inline" x-data="{ showCancellationForm: false }">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="canceled">
                        
                        <button type="button" @click="showCancellationForm = true" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Cancel Booking
                        </button>
                        
                        <!-- Cancellation Reason Modal -->
                        <div x-show="showCancellationForm" class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <!-- Background overlay -->
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                
                                <!-- Modal panel -->
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <svg class="h-6 w-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Cancel Booking
                                                </h3>
                                                <div class="mt-4">
                                                    <p class="text-sm text-gray-500 mb-4">
                                                        Are you sure you want to cancel this booking? This action will send a cancellation email to the customer.
                                                    </p>
                                                    
                                                    <div class="mb-4">
                                                        <label for="cancellation_reason" class="block text-sm font-medium text-gray-700 mb-1">Cancellation Reason</label>
                                                        <textarea 
                                                            id="cancellation_reason" 
                                                            name="cancellation_reason" 
                                                            rows="3"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 resize-none"
                                                            placeholder="Please provide a reason for the cancellation (optional)"></textarea>
                                                        <p class="mt-1 text-xs text-gray-500">This reason will be included in the cancellation email sent to the customer.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Confirm Cancellation
                                        </button>
                                        <button type="button" @click="showCancellationForm = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Go Back
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif

                @if($booking->flying_status === 'confirmed')
                    <form action="{{ route('admin.bookings.postpone', $booking) }}" method="POST" class="inline" x-data="{ showPostponeForm: false }">
                        @csrf
                        @method('PATCH')
                        
                        <button type="button" @click="showPostponeForm = true" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all duration-200">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Postpone Flight
                        </button>
                        
                        <!-- Postpone Modal -->
                        <div x-show="showPostponeForm" class="fixed inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                <!-- Background overlay -->
                                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                
                                <!-- Modal panel -->
                                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex sm:items-start">
                                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-yellow-100 sm:mx-0 sm:h-10 sm:w-10">
                                                <svg class="h-6 w-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                    Postpone Flight
                                                </h3>
                                                <div class="mt-4">
                                                    <p class="text-sm text-gray-500 mb-4">
                                                        Please select a new date and time for this flight. A notification email will be sent to the customer.
                                                    </p>
                                                    
                                                    <div class="mb-4">
                                                        <p class="text-sm font-medium text-gray-700 mb-1">Current Flight Date and Time:</p>
                                                        <p class="text-sm text-gray-500 mb-4">
                                                            {{ \Carbon\Carbon::parse($booking->flying_time)->format('F d, Y g:i A') }}
                                                        </p>
                                                        
                                                        <label for="flying_time" class="block text-sm font-medium text-gray-700 mb-1">New Flight Date and Time</label>
                                                        <input type="datetime-local" 
                                                               id="flying_time" 
                                                               name="flying_time" 
                                                               value="{{ old('flying_time', $booking->flying_time ? date('Y-m-d\TH:i', strtotime($booking->flying_time . '+1 day')) : date('Y-m-d\TH:i', strtotime('+1 day'))) }}" 
                                                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                               required>
                                                        <p class="mt-1 text-xs text-gray-500">Select the new date and time for the flight.</p>
                                                    </div>
                                                    
                                                    <div class="mb-4">
                                                        <label for="postponement_reason" class="block text-sm font-medium text-gray-700 mb-1">Reason for Postponement</label>
                                                        <textarea 
                                                            id="postponement_reason" 
                                                            name="postponement_reason" 
                                                            rows="3"
                                                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-yellow-500 focus:ring-yellow-500 resize-none"
                                                            placeholder="Please provide a reason for the postponement (optional)"></textarea>
                                                        <p class="mt-1 text-xs text-gray-500">This reason will be included in the notification email sent to the customer.</p>
                                                    </div>
                                                    
                                                    @if($errors->has('flying_time'))
                                                        <p class="mt-2 text-sm text-red-600">{{ $errors->first('flying_time') }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-600 text-base font-medium text-white hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                                            Confirm Postponement
                                        </button>
                                        <button type="button" @click="showPostponeForm = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>

        <!-- Status Banner -->
        <div class="bg-white rounded-lg shadow-sm mb-6 overflow-hidden">
            <div class="p-0">
                <div class="flex flex-col md:flex-row">
                    <!-- Status Column -->
                    <div class="w-full md:w-1/4 p-6 {{ $booking->flying_status === 'confirmed' ? 'bg-green-50 text-green-800' : 
                        ($booking->flying_status === 'pending' ? 'bg-yellow-50 text-yellow-800' : 
                        'bg-red-50 text-red-800') }} flex flex-col justify-center items-center border-b md:border-b-0 md:border-r border-gray-200">
                        
                        <div class="rounded-full h-16 w-16 flex items-center justify-center mb-3 
                            {{ $booking->flying_status === 'confirmed' ? 'bg-green-100' : 
                            ($booking->flying_status === 'pending' ? 'bg-yellow-100' : 
                            'bg-red-100') }}">
                            
                            @if($booking->flying_status === 'confirmed')
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            @elseif($booking->flying_status === 'pending')
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            @else
                                <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            @endif
                        </div>
                        
                        <div class="font-bold text-lg mb-1">{{ ucfirst($booking->flying_status) }}</div>
                        
                        @if($booking->flying_status === 'confirmed' && $booking->flying_time)
                            <div class="text-sm text-center">
                                Scheduled for<br>{{ \Carbon\Carbon::parse($booking->flying_time)->format('M d, Y g:i A') }}
                            </div>
                        @endif
                    </div>
                    
                    <!-- Payment Details -->
                    <div class="flex-grow p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <h4 class="text-xs font-semibold uppercase text-gray-500 tracking-wider">Package</h4>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ ucfirst($booking->package) }}</p>
                                <p class="text-sm text-gray-500">{{ $booking->sunrise_flight ? 'Sunrise Flight' : 'Regular Flight' }}</p>
                            </div>
                            
                            <div>
                                <h4 class="text-xs font-semibold uppercase text-gray-500 tracking-wider">Date</h4>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $booking->preferred_dates->format('M d, Y') }}</p>
                                <p class="text-sm text-gray-500">Preferred Date</p>
                            </div>
                            
                            <div>
                                <h4 class="text-xs font-semibold uppercase text-gray-500 tracking-wider">Total Payment</h4>
                                <p class="mt-1 text-lg font-semibold text-gray-900">${{ number_format($booking->total_amount, 2) }}</p>
                                <!-- <p class="text-sm text-gray-500">
                                    <a href="{{ route('admin.bookings.export', ['id' => $booking->id]) }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                        <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        Export PDF
                                    </a>
                                </p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if($booking->flying_status === 'canceled' && $booking->cancellation_reason)
            <div class="px-6 py-4 border-t border-gray-200 bg-red-50">
                <div class="flex items-start">
                    <svg class="h-5 w-5 text-red-600 mt-0.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <div>
                        <h4 class="text-sm font-medium text-red-800">Cancellation Reason:</h4>
                        <p class="mt-1 text-sm text-red-700">{{ $booking->cancellation_reason }}</p>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-blue-800 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Customer Information
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6 space-y-4 relative">
                    <div class="flex">
                        <div class="h-12 w-12 rounded-full bg-blue-100 flex items-center justify-center mr-4">
                            <span class="text-blue-600 font-bold text-lg">{{ strtoupper(substr($booking->name, 0, 1)) }}</span>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Name</h4>
                            <p class="mt-1 text-base font-semibold text-gray-900">{{ $booking->name }}</p>
                        </div>
                    </div>
                    <div class="pl-16">
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            Email
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->email }}</p>
                    </div>
                    <div class="pl-16">
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Phone
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->primary_phone }}</p>
                    </div>
                    <div class="pl-16">
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Date of Birth
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->date_of_birth ? $booking->date_of_birth->format('M d, Y') : 'Not provided' }}</p>
                    </div>
                    <div class="pl-16">
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Age
                        </h4>
                        <p class="mt-1 text-base text-gray-900">
                            @if($booking->date_of_birth)
                                {{ \Carbon\Carbon::parse($booking->date_of_birth)->age }} years
                            @else
                                Not provided
                            @endif
                        </p>
                    </div>
                    <div class="pl-16">
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                            </svg>
                            Weight
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->weight ? $booking->weight . ' kg' : 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Emergency Contact -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
                <div class="bg-gradient-to-r from-red-50 to-red-100 px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-red-800 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Emergency Contact
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6 space-y-4">
                    <div class="bg-red-50 p-4 rounded-lg">
                        <div class="flex items-start">
                            <svg class="h-5 w-5 text-red-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <p class="text-sm text-red-700">
                                <span class="font-medium">In Case of Emergency</span><br>
                                This information should only be used in case of an emergency during the flight.
                            </p>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Name
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->emergency_name ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                            Relationship
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->emergency_relationship ?? 'Not provided' }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500 flex items-center">
                            <svg class="h-4 w-4 mr-1 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            Phone
                        </h4>
                        <p class="mt-1 text-base text-gray-900">{{ $booking->emergency_phone ?? 'Not provided' }}</p>
                    </div>
                </div>
            </div>

            <!-- Flight Information -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
                <div class="bg-gradient-to-r from-purple-50 to-purple-100 px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-purple-800 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                        Flight Information
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6 space-y-4">
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-purple-100 flex items-center justify-center mr-4">
                            <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Package</h4>
                            <p class="mt-1 text-lg font-medium text-gray-900">{{ ucfirst($booking->package) }}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="bg-purple-50 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-purple-700">Preferred Date</h4>
                            <p class="mt-1 text-base text-gray-900">{{ $booking->preferred_dates->format('F d, Y') }}</p>
                        </div>
                        
                        <div class="bg-purple-50 rounded-lg p-4">
                            <h4 class="text-sm font-medium text-purple-700">Flight Type</h4>
                            <p class="mt-1 text-base text-gray-900">{{ $booking->sunrise_flight ? 'Sunrise Flight' : 'Regular Flight' }}</p>
                        </div>
                    </div>
                    
                    @if($booking->flying_status === 'confirmed' && $booking->flying_time)
                    <div class="mt-6 bg-green-50 rounded-lg p-4 border-l-4 border-green-500">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-green-800">Scheduled Flying Time</h4>
                                <p class="mt-1 text-base text-green-700 font-medium">{{ \Carbon\Carbon::parse($booking->flying_time)->format('F d, Y g:i A') }}</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="mt-6 bg-yellow-50 rounded-lg p-4 border-l-4 border-yellow-500">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-yellow-800">Flying Time</h4>
                                <p class="mt-1 text-base text-yellow-700">Not yet scheduled</p>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Add-ons and Extras -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
                <div class="bg-gradient-to-r from-green-50 to-green-100 px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-green-800 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Add-ons and Extras
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <ul class="divide-y divide-gray-200">
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 {{ $booking->video_package ? 'text-green-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span class="text-gray-700">Video Package</span>
                            </div>
                            <span class="flex items-center font-medium {{ $booking->video_package ? 'text-green-700' : 'text-gray-500' }}">
                                @if($booking->video_package)
                                <svg class="h-5 w-5 mr-1.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Yes
                                @else
                                <svg class="h-5 w-5 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                No
                                @endif
                            </span>
                        </li>
                        
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 {{ $booking->deluxe_package ? 'text-green-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                </svg>
                                <span class="text-gray-700">Deluxe Package</span>
                            </div>
                            <span class="flex items-center font-medium {{ $booking->deluxe_package ? 'text-green-700' : 'text-gray-500' }}">
                                @if($booking->deluxe_package)
                                <svg class="h-5 w-5 mr-1.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Yes
                                @else
                                <svg class="h-5 w-5 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                No
                                @endif
                            </span>
                        </li>
                        
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 {{ $booking->merch_package ? 'text-green-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span class="text-gray-700">Merchandise Package</span>
                            </div>
                            <span class="flex items-center font-medium {{ $booking->merch_package ? 'text-green-700' : 'text-gray-500' }}">
                                @if($booking->merch_package)
                                <svg class="h-5 w-5 mr-1.5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Yes ({{ $booking->merch_package }})
                                @else
                                <svg class="h-5 w-5 mr-1.5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                No
                                @endif
                            </span>
                        </li>
                        
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 {{ $booking->accommodation ? 'text-green-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <span class="text-gray-700">Accommodation</span>
                            </div>
                            <span class="font-medium {{ $booking->accommodation ? 'text-green-700' : 'text-gray-500' }}">
                                {{ $booking->accommodation ?? 'Not requested' }}
                            </span>
                        </li>
                        
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 {{ $booking->special_event ? 'text-green-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
                                </svg>
                                <span class="text-gray-700">Special Event</span>
                            </div>
                            <span class="font-medium {{ $booking->special_event ? 'text-green-700' : 'text-gray-500' }}">
                                {{ $booking->special_event ?? 'None' }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
                <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-yellow-800 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Additional Information
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6 space-y-4">
                    <div class="bg-yellow-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-yellow-700">Special Requests</h4>
                        <p class="mt-1 text-base text-gray-900 whitespace-pre-line">{{ $booking->additional_info ?? 'No special requests' }}</p>
                    </div>
                </div>
            </div>

            <!-- Payment Information -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
                <div class="bg-gradient-to-r from-indigo-50 to-indigo-100 px-4 py-3 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-indigo-800 flex items-center">
                        <svg class="h-5 w-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                        Payment Information
                    </h3>
                </div>
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex items-center justify-center bg-indigo-50 rounded-lg p-6 mb-6">
                        <div class="text-center">
                            <span class="text-3xl font-bold text-indigo-700">${{ number_format($booking->total_amount, 2) }}</span>
                            <p class="text-sm text-indigo-600 mt-1">Total Amount</p>
                        </div>
                    </div>
                    
                    <ul class="divide-y divide-gray-200">
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                </svg>
                                <span class="text-gray-700">Order ID</span>
                            </div>
                            <span class="font-medium text-gray-900">{{ $booking->order_id ?? 'Not available' }}</span>
                        </li>
                        
                        <li class="py-3 flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 mr-3 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="text-gray-700">Payment ID</span>
                            </div>
                            <span class="font-medium text-gray-900">{{ $booking->payment_id ?? 'Not available' }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @if($booking->waiver_pdf_path)
        <!-- Waiver Information -->
        <div class="mt-6 bg-white rounded-lg shadow-sm overflow-hidden transform transition-all duration-300 hover:shadow-md">
            <div class="bg-gradient-to-r from-pink-50 to-pink-100 px-4 py-3 border-b border-gray-200">
                <h3 class="text-lg font-medium text-pink-800 flex items-center">
                    <svg class="h-5 w-5 mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Waiver Document
                </h3>
            </div>
            <div class="px-4 py-5 sm:p-6 bg-pink-50 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="h-12 w-12 bg-pink-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="h-6 w-6 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-pink-700">Signed waiver document</p>
                        <p class="text-xs text-pink-600 mt-1">PDF document containing customer signed waiver</p>
                        <p class="text-xs text-gray-600 mt-1">
                            <span class="inline-flex items-center">
                                <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
                                </svg>
                                {{ strpos($booking->waiver_pdf_url, 's3') !== false ? 'Stored on Amazon S3' : 'Stored on Local Storage' }}
                            </span>
                        </p>
                    </div>
                </div>
                <a href="{{ $booking->waiver_pdf_url }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-pink-600 hover:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition-all duration-200">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    View Signed Waiver
                </a>
                @if(strpos($booking->waiver_pdf_url, 's3') !== false)
                <div class="mt-2">
                    <button type="button" 
                            onclick="navigator.clipboard.writeText('{{ $booking->waiver_pdf_url }}'); this.innerText = 'Copied!'; setTimeout(() => this.innerText = 'Copy S3 URL', 2000)"
                            class="text-xs text-blue-600 hover:text-blue-800 flex items-center">
                        <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                        Copy S3 URL
                    </button>
                </div>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

@if(session('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 3000)"
         class="fixed bottom-4 right-4 bg-green-100 p-4 rounded-lg shadow-xl border-l-4 border-green-500 transform transition-all duration-500 ease-in-out">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-6 w-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    {{ session('success') }}
                </p>
            </div>
            <div class="ml-4 flex-shrink-0 flex">
                <button @click="show = false" class="bg-green-100 rounded-md inline-flex text-green-500 hover:text-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all duration-200">
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
    // Success notification animation
    setTimeout(() => {
        const notification = document.querySelector('.fixed.bottom-4.right-4');
        if (notification) {
            notification.classList.add('animate-bounce');
            setTimeout(() => {
                notification.classList.remove('animate-bounce');
            }, 1000);
        }
    }, 300);
</script>
@endpush
@endsection 