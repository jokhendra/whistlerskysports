@extends('admin.layout.admin')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex items-center justify-between">
            <div>
                <h1 class="text-xl font-semibold text-gray-800">Account Settings</h1>
                <p class="text-sm text-gray-500">Manage your profile information and password.</p>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
            {{-- Profile card --}}
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-800">Profile</h2>
                    <p class="text-sm text-gray-500 mt-1">Your public-facing name and contact email.</p>
                </div>

                @if(session('success'))
                    <div class="rounded-md bg-green-50 p-4 border border-green-100">
                        <p class="text-sm text-green-700">{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('admin.profile.update') }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input id="name" name="name" type="text" value="{{ old('name', $admin->name) }}" class="mt-1 block w-full rounded-lg border border-gray-200 bg-white py-2 px-3 shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#204fb4] focus:border-transparent transition duration-150" required>
                            @error('name')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <div class="mt-1 flex items-center gap-3">
                                <input id="email" type="text" value="{{ $admin->email }}" readonly class="block w-full rounded-lg border border-gray-200 bg-gray-50 py-2 px-3 text-gray-700 shadow-sm placeholder-gray-400 focus:outline-none transition duration-150">
                                <span class="text-sm text-gray-500">(not editable)</span>
                            </div>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-[#204fb4] text-white rounded-md shadow">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Password card --}}
            <div class="space-y-4">
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h2 class="text-lg font-medium text-gray-800">Change password</h2>
                    <p class="text-sm text-gray-500 mt-1">For security, choose a strong password. Minimum 8 characters.</p>
                </div>

                <form action="{{ route('admin.profile.password') }}" method="POST" class="bg-white p-6 rounded-lg shadow-sm">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700">Current password</label>
                            <input id="current_password" name="current_password" type="password" class="mt-1 block w-full rounded-lg border border-gray-200 bg-white py-2 px-3 shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#204fb4] focus:border-transparent transition duration-150" required>
                            @error('current_password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700">New password</label>
                            <input id="password" name="password" type="password" class="mt-1 block w-full rounded-lg border border-gray-200 bg-white py-2 px-3 shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#204fb4] focus:border-transparent transition duration-150" required>
                            @error('password')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>

                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm new password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full rounded-lg border border-gray-200 bg-white py-2 px-3 shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#204fb4] focus:border-transparent transition duration-150" required>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">Tip: Use a mix of letters, numbers & symbols.</div>
                            <button type="submit" class="inline-flex items-center gap-2 px-4 py-2 bg-[#204fb4] text-white rounded-md shadow">Update password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


