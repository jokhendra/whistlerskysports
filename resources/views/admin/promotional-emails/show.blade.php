@extends('admin.layout.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-6">
            <div class="sm:flex sm:items-center sm:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                        Promotional Email Details
                    </h2>
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                        <div class="mt-2 flex items-center text-sm text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Created {{ $promotionalEmail->created_at->format('M d, Y H:i') }}
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex sm:mt-0 sm:ml-4">
                    <span class="relative z-0 inline-flex shadow-sm rounded-md">
                        @if($promotionalEmail->status !== 'sent')
                            <a href="{{ route('admin.promotional-emails.edit', $promotionalEmail) }}" 
                               class="relative inline-flex items-center px-4 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">
                                Edit Email
                            </a>

                            <form action="{{ route('admin.promotional-emails.send', $promotionalEmail) }}" 
                                  method="POST" 
                                  class="-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                                  onsubmit="return confirm('Are you sure you want to send this email?');">
                                @csrf
                                <button type="submit">Send Email</button>
                            </form>
                        @endif

                        <form action="{{ route('admin.promotional-emails.destroy', $promotionalEmail) }}" 
                              method="POST" 
                              class="-ml-px relative inline-flex items-center px-4 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-red-700 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500"
                              onsubmit="return confirm('Are you sure you want to delete this email?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete Email</button>
                        </form>
                    </span>

                    <a href="{{ route('admin.promotional-emails.index') }}" 
                       class="ml-3 inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Back to List
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    Email Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Details and content of the promotional email.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Subject
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $promotionalEmail->subject }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Recipient Group
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ ucfirst($promotionalEmail->recipient_group) }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Status
                        </dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                {{ $promotionalEmail->status === 'draft' ? 'bg-gray-100 text-gray-800' : 
                                   ($promotionalEmail->status === 'scheduled' ? 'bg-yellow-100 text-yellow-800' : 
                                   'bg-green-100 text-green-800') }}">
                                {{ ucfirst($promotionalEmail->status) }}
                            </span>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Scheduled For
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $promotionalEmail->scheduled_at ? $promotionalEmail->scheduled_at->format('M d, Y H:i') : 'Not scheduled' }}
                        </dd>
                    </div>
                    @if($promotionalEmail->sent_at)
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Sent At
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $promotionalEmail->sent_at->format('M d, Y H:i') }}
                            </dd>
                        </div>
                    @endif
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Content
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 whitespace-pre-wrap">
                            {{ $promotionalEmail->content }}
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        @if($promotionalEmail->status !== 'sent')
            <!-- Test Email Form -->
            <div class="mt-6 bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-6 py-5 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Send Test Email
                    </h3>
                </div>
                <form action="{{ route('admin.promotional-emails.send-test', $promotionalEmail) }}" 
                      method="POST" 
                      class="p-6">
                    @csrf
                    <div class="space-y-6">
                        <div>
                            <label for="test_email" class="block text-sm font-medium text-gray-700">
                                Test Email Address
                            </label>
                            <div class="mt-1">
                                <input type="email" 
                                       name="test_email" 
                                       id="test_email"
                                       class="block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                                       required>
                            </div>
                            @error('test_email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                Send Test Email
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @endif
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
        </div>
    </div>
@endif
@endsection 