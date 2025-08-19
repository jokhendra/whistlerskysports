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
                            
                            <div>
                                <label for="linkedin_url" class="block text-sm font-medium text-gray-700">LinkedIn URL</label>
                                <input type="url" name="linkedin_url" id="linkedin_url" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['linkedin_url'] ?? '' }}">
                            </div>
                            
                            <div>
                                <label for="youtube_url" class="block text-sm font-medium text-gray-700">YouTube URL</label>
                                <input type="url" name="youtube_url" id="youtube_url" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['youtube_url'] ?? '' }}">
                            </div>
                            
                            <div>
                                <label for="pinterest_url" class="block text-sm font-medium text-gray-700">Pinterest URL</label>
                                <input type="url" name="pinterest_url" id="pinterest_url" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['pinterest_url'] ?? '' }}">
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

                    <!-- Google Settings -->
                    <div class="pt-6">
                        <h3 class="text-lg font-medium leading-6 text-gray-900">Google Settings</h3>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div>
                                <label for="google_calendar_id" class="block text-sm font-medium text-gray-700">
                                    Google Calendar ID
                                    <span class="ml-2 text-gray-400" title="The Calendar ID is found in Google Calendar settings; share the calendar with the service account email and give edit permissions.">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                        </svg>
                                    </span>
                                </label>
                                <input type="text" name="google_calendar_id" id="google_calendar_id"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['google_calendar_id'] ?? '' }}">
                                <p class="mt-2 text-sm text-gray-500">Find the calendar ID in Google Calendar &gt; Settings and sharing &gt; Integrate calendar. Share the calendar with your service account email and give "Make changes to events" permission. See <code>GOOGLE_API_SETUP.md</code> for full steps.</p>
                            </div>

                            <div>
                                <label for="google_spreadsheet_id" class="block text-sm font-medium text-gray-700">
                                    Google Spreadsheet ID
                                    <span class="ml-2 text-gray-400" title="The Spreadsheet ID is the long ID in the sheet URL between '/d/' and '/edit'. Share the sheet with the service account email as an editor.">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20 10 10 0 000-20z" />
                                        </svg>
                                    </span>
                                </label>
                                <input type="text" name="google_spreadsheet_id" id="google_spreadsheet_id"
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#204fb4] focus:ring focus:ring-[#204fb4]/20 transition-all duration-200"
                                       value="{{ $settings['google_spreadsheet_id'] ?? '' }}">
                                <p class="mt-2 text-sm text-gray-500">The spreadsheet ID is the part of the URL between <code>/d/</code> and <code>/edit</code>. Share the sheet with the service account email (from your JSON key) and grant Editor access. See <code>GOOGLE_API_SETUP.md</code> for details.</p>
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