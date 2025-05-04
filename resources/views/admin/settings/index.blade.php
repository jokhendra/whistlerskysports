@extends('admin.layout.admin')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="space-y-6">
                    <!-- General Settings -->
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">General Settings</h3>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div>
                                <label for="site_name" class="block text-sm font-medium text-gray-700">Site Name</label>
                                <input type="text" name="site_name" id="site_name" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['site_name'] ?? '' }}" required>
                            </div>

                            <div>
                                <label for="site_logo" class="block text-sm font-medium text-gray-700">Site Logo</label>
                                <input type="file" name="site_logo" id="site_logo" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-[#204fb4]/10 file:text-[#204fb4] hover:file:bg-[#204fb4]/20">
                                @if(isset($settings['site_logo']))
                                    <div class="mt-2">
                                        <img src="{{ Storage::disk('s3')->url($settings['site_logo']) }}" alt="Current Logo" class="h-12">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="pt-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Contact Information</h3>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div>
                                <label for="contact_email" class="block text-sm font-medium text-gray-700">Contact Email</label>
                                <input type="email" name="contact_email" id="contact_email" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['contact_email'] ?? '' }}" required>
                            </div>

                            <div>
                                <label for="phone_number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                <input type="text" name="phone_number" id="phone_number" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['phone_number'] ?? '' }}" required>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                <textarea name="address" id="address" rows="3" 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                          required>{{ $settings['address'] ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media Links -->
                    <div class="pt-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Social Media Links</h3>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div>
                                <label for="facebook_url" class="block text-sm font-medium text-gray-700">Facebook URL</label>
                                <input type="url" name="facebook_url" id="facebook_url" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['facebook_url'] ?? '' }}">
                            </div>

                            <div>
                                <label for="twitter_url" class="block text-sm font-medium text-gray-700">Twitter URL</label>
                                <input type="url" name="twitter_url" id="twitter_url" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['twitter_url'] ?? '' }}">
                            </div>

                            <div>
                                <label for="instagram_url" class="block text-sm font-medium text-gray-700">Instagram URL</label>
                                <input type="url" name="instagram_url" id="instagram_url" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['instagram_url'] ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- SEO Settings -->
                    <div class="pt-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">SEO Settings</h3>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label for="meta_description" class="block text-sm font-medium text-gray-700">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3" 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200">{{ $settings['meta_description'] ?? '' }}</textarea>
                            </div>

                            <div class="sm:col-span-2">
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700">Meta Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['meta_keywords'] ?? '' }}"
                                       placeholder="Enter keywords separated by commas">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex justify-end">
                    <button type="submit" class="inline-flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-xl text-white bg-[#204fb4] hover:bg-[#204fb4]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#204fb4]/20 transition-all duration-200">
                        Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 