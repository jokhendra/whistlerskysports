@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 py-12 px-4 sm:px-6 lg:px-8 mt-16">
    <div class="max-w-md w-full bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Forgot your password?</h2>
        <p class="text-sm text-gray-500 mb-6">Enter your email and we'll send you a link to reset your password.</p>

        @if(session('status'))
            <div class="bg-green-50 border-l-4 border-green-400 text-green-700 p-4 mb-4">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                <input id="email" name="email" type="email" required value="{{ old('email') }}" class="mt-1 block w-full px-3 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="you@example.com">
                @error('email') <p class="text-sm text-red-600 mt-2">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-gray-500 hover:text-gray-700">Back to login</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Send Reset Link</button>
            </div>
        </form>
    </div>
</div>
@endsection


