@extends('admin.layout.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">User Details</h2>
            <p class="mt-1 text-sm text-gray-600">Details for {{ $user->name }}</p>
        </div>
        <div>
            <a href="{{ route('admin.users') }}" class="px-4 py-2 bg-gray-200 rounded-md text-sm text-gray-700 hover:bg-gray-300">Back to Users</a>
            <form action="{{ route('admin.users.update-status', $user) }}" method="POST" class="inline-block ml-2">
                @csrf
                @method('PATCH')
                <input type="hidden" name="status" value="{{ $user->status ? 0 : 1 }}">
                <button type="submit" class="px-3 py-2 rounded-md text-sm {{ $user->status ? 'bg-red-100 text-red-800 hover:bg-red-200' : 'bg-green-100 text-green-800 hover:bg-green-200' }}">
                    {{ $user->status ? 'Disable User' : 'Enable User' }}
                </button>
            </form>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
            <p class="mt-1 text-sm text-gray-500">Basic account information</p>
        </div>
        <div class="px-4 py-5 sm:p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium text-gray-500">Name</label>
                    <div class="mt-1 text-sm text-gray-900">{{ $user->name }}</div>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Email</label>
                    <div class="mt-1 text-sm text-gray-900">{{ $user->email }}</div>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Last Login</label>
                    <div class="mt-1 text-sm text-gray-900">{{ optional($user->last_login_at)->format('M d, Y H:i') ?? 'Never' }}</div>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Last IP</label>
                    <div class="mt-1 text-sm text-gray-900">{{ $user->last_login_ip ?? '—' }}</div>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Status</label>
                    <div class="mt-1 text-sm">
                        @if($user->status == 1)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Disabled</span>
                        @endif
                    </div>
                </div>
                <div>
                    <label class="text-sm font-medium text-gray-500">Registered</label>
                    <div class="mt-1 text-sm text-gray-900">{{ $user->created_at->format('M d, Y H:i') }}</div>
                </div>
                <div class="md:col-span-2">
                    <label class="text-sm font-medium text-gray-500">Notes</label>
                    <div class="mt-1 text-sm text-gray-900">{{ $user->notes ?? '—' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


