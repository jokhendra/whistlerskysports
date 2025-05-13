@extends('layouts.app')

@push('styles')
<style>
/* Weather Animations and Effects */
.weather-gradient {
    background-size: 200% auto;
    animation: gradientFlow 5s ease infinite;
}

@keyframes gradientFlow {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.windy-container {
    box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.3);
    transition: all 0.3s ease;
}

.windy-container:hover {
    box-shadow: 0 20px 30px -10px rgba(59, 130, 246, 0.4);
    transform: translateY(-5px);
}

.weather-card {
    transition: all 0.3s ease;
}

.weather-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px -5px rgba(59, 130, 246, 0.2);
}
</style>
@endpush

@section('content')
  <div class="container mx-auto px-4 py-8 sm:py-12 mt-24">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold text-center mb-4 text-blue-900 bg-clip-text bg-gradient-to-r from-blue-900 to-blue-600">Interactive Weather Map</h1>
        <p class="text-center text-gray-600 mb-8 sm:mb-12 max-w-3xl mx-auto text-sm sm:text-base">
            Explore real-time weather conditions with our interactive Windy.com integration. Monitor wind patterns, precipitation, temperature, and more to plan your perfect flying experience.
        </p>

        <!-- Interactive Windy Map -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-4 sm:p-8 border border-blue-100 windy-container">
            <div class="flex flex-col lg:flex-row lg:items-start gap-8">
                <!-- Main Windy Iframe -->
                <div class="w-full lg:w-3/4 overflow-hidden rounded-xl border-2 border-blue-200 bg-white">
                    <iframe 
                        width="100%" 
                        height="650" 
                        src="https://embed.windy.com/embed2.html?lat=50.303&lon=-122.738&zoom=11&level=surface&overlay=satellite&product=ecmwf&menu=&message=&marker=&calendar=&pressure=&type=map&location=coordinates&detail=&metricWind=kts&metricTemp=%C2%B0C&airport=CYPS" 
                        frameborder="0"
                        class="w-full"
                        title="Windy.com Interactive Weather Map"
                        loading="lazy">
                    </iframe>
            </div>

                <!-- Weather Info Sidebar -->
                <div class="w-full lg:w-1/4">
                    <!-- Controls Section -->
                    <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-4 sm:p-6 mb-6 border border-blue-100 weather-card">
                        <h2 class="text-xl font-bold text-blue-900 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Map Controls
                        </h2>
                        <p class="text-sm text-blue-700 mb-4">Use these options to customize your weather view:</p>
                        <ul class="space-y-3 text-sm">
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-800 p-1 rounded-full flex-shrink-0 mt-0.5 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                                <span>Click and drag to move the map</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-800 p-1 rounded-full flex-shrink-0 mt-0.5 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                                <span>Use the menu to switch between wind, rain, temperature layers</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-800 p-1 rounded-full flex-shrink-0 mt-0.5 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                                <span>Use the time slider to view forecast predictions</span>
                            </li>
                            <li class="flex items-start">
                                <span class="bg-blue-100 text-blue-800 p-1 rounded-full flex-shrink-0 mt-0.5 mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </span>
                                <span>Zoom in/out for detailed local conditions</span>
                            </li>
                        </ul>
                  </div>
                  
                    <!-- Flying Conditions -->
                    <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-4 sm:p-6 mb-6 border border-blue-100 weather-card">
                        <h2 class="text-xl font-bold text-blue-900 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            Ideal Flying Conditions
                        </h2>
                        <ul class="space-y-2">
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Wind below 15 knots
                            </li>
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Visibility over 3 miles
                            </li>
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                Cloud ceiling above 2,500 ft
                            </li>
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-green-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                No precipitation
                            </li>
                        </ul>
                    </div>
                    
                    <!-- No-Fly Conditions -->
                    <div class="bg-gradient-to-br from-red-50 to-white rounded-xl p-4 sm:p-6 border border-red-100 weather-card">
                        <h2 class="text-xl font-bold text-red-900 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-red-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            No-Fly Conditions
                        </h2>
                        <ul class="space-y-2">
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Strong, gusting winds (>20 knots)
                            </li>
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Low solid cloud ceiling
                            </li>
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Rain or snow conditions
                            </li>
                            <li class="flex items-center text-sm">
                                <svg class="w-4 h-4 text-red-500 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                                Thunderstorms in vicinity
                            </li>
                        </ul>
                  </div>
                </div>
              </div>
            </div>

        <!-- Feature Callouts -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
            <!-- Wind Feature -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 weather-card">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                  </svg>
                    </div>
                    <h3 class="text-lg font-bold text-blue-900">Wind Patterns</h3>
                </div>
                <p class="text-sm text-gray-700">Monitor real-time wind speeds and directions to select optimal launch times. Visualize wind patterns at various altitudes.</p>
              </div>

            <!-- Precipitation Feature -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 weather-card">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                  </svg>
                </div>
                    <h3 class="text-lg font-bold text-blue-900">Precipitation</h3>
                </div>
                <p class="text-sm text-gray-700">Track rain and snow patterns to avoid adverse weather. View precipitation intensity and forecast to plan your activities accordingly.</p>
              </div>

            <!-- Temperature Feature -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 weather-card">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                  </svg>
                </div>
                    <h3 class="text-lg font-bold text-blue-900">Temperature</h3>
                </div>
                <p class="text-sm text-gray-700">Check ground and altitude temperatures to prepare properly. Temperature gradients affect air density and flying conditions.</p>
        </div>
        
            <!-- Cloud Coverage Feature -->
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100 weather-card">
                <div class="flex items-center mb-4">
                    <div class="p-3 bg-blue-100 rounded-lg mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-blue-900">Cloud Coverage</h3>
                </div>
                <p class="text-sm text-gray-700">Assess cloud ceiling heights and coverage percentages. Determine visibility conditions and potential flying hazards.</p>
        </div>
      </div>
      
        <!-- Weather Disclaimer -->
        <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-6 mt-12 border border-blue-100">
            <h2 class="text-2xl font-bold text-blue-900 mb-4 flex items-center">
                <span class="inline-block mr-3 p-2 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
                Weather Policy
        </h2>
        <div class="prose max-w-none text-gray-700">
                <p class="mb-4">Mountain weather can change rapidly and unpredictably. While we use advanced forecasting tools, our qualified staff will make final weather evaluations on the day of your scheduled activity.</p>
                
                <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-l-4 border-blue-500 p-4 mb-4 rounded-r-xl">
                    <p class="text-blue-900 text-sm">If we need to cancel due to weather conditions, you can reschedule for another time or receive a full refund.</p>
          </div>

                <!-- <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border-l-4 border-yellow-500 p-4 rounded-r-xl">
                    <p class="text-yellow-900 text-sm"><strong>Important:</strong> If you're concerned about the weather forecast for your booking date and wish to reschedule proactively, our normal cancellation policy applies.</p>
                </div> -->
          </div>
        </div>
      </div>
    </div>
@endsection