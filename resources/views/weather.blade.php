@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
@include("common.header")
<body>
  @include("common.nav")
  <div class="container mx-auto px-4 py-8 pt-15">
    <div class="max-w-5xl mx-auto">
      <h1 class="text-3xl md:text-5xl font-bold text-center mb-2 text-blue-900 drop-shadow-sm">Weather Information</h1>

      <!-- Weather Information Box -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Pemberton Weather</h2>
        <div class="prose max-w-none text-gray-600">
          <p class="mb-4">The weather is important, few clouds and light winds are ideal for skydiving but are not always the case.</p>
          
          <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-4">
            <p class="font-medium">We do not skydive in:</p>
            <ul class="list-disc list-inside mt-2">
              <li>Strong, gusting winds</li>
              <li>Low solid cloud ceiling</li>
              <li>Rain conditions</li>
            </ul>
          </div>

          <p class="mb-4">If we need to cancel due to the weather you can reschedule for another time and date or you will get a full refund.</p>
          
          <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-4">
            <p>The weather can change so quickly here in the mountains and we cannot confidently rely on the weather forecast. Our qualified staff will make a weather evaluation on the day of the jump.</p>
          </div>

          <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4">
            <p><strong>Important:</strong> If you are concerned about the weather forecast for the day of your booking and wish to reschedule or get a refund, our normal cancellation policy applies.</p>
          </div>
        </div>
      </div>

      <!-- Current Weather -->
      <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
          <!-- Current Weather -->
          <div class="bg-blue-50 rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-blue-800 mb-6">Current Conditions</h2>
            
            <!-- Main Temperature Display -->
            <div class="flex items-center mb-8 bg-white rounded-xl p-4 shadow-sm">
              <div class="text-6xl font-bold text-blue-900">{{ $currentTemp }}°C</div>
              <div class="ml-6 border-l pl-6 border-gray-200">
                <div class="text-xl font-medium text-gray-800">{{ $weatherDescription }}</div>
                <div class="text-gray-600 text-lg">Feels like {{ $feelsLike }}°C</div>
              </div>
            </div>

            <!-- Wind Information -->
            <div class="bg-white rounded-xl p-4 shadow-sm mb-6">
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-6">
                  <div>
                    <h3 class="text-gray-600 font-medium mb-1">Wind Speed</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ $windSpeed }} km/h</p>
                  </div>
                  
                  <!-- Wind Direction Compass -->
                  <div class="relative">
                    <div class="w-24 h-24 rounded-full border-2 border-gray-700 relative bg-gray-900 shadow-lg overflow-hidden">
                      <!-- Degree Markers (36 marks for every 10 degrees) -->
                      @php
                        for($i = 0; $i < 36; $i++) {
                          $length = $i % 9 === 0 ? '8px' : '4px';
                          $width = $i % 9 === 0 ? '2px' : '1px';
                          echo '<div class="absolute top-1/2 left-1/2 bg-gray-600" style="width: ' . $width . '; height: ' . $length . '; transform-origin: center; transform: translate(-50%, -50%) rotate(' . ($i * 10) . 'deg) translateY(-22px);"></div>';
                        }
                      @endphp

                      <!-- Cardinal Lines -->
                      <div class="absolute inset-0">
                        <!-- North Line (Red) -->
                        <div class="absolute top-1/2 left-1/2 w-0.5 h-[50%] bg-gradient-to-t from-transparent to-red-500" style="transform: translate(-50%, -50%) rotate(0deg)"></div>
                        <!-- South Line -->
                        <div class="absolute top-1/2 left-1/2 w-0.5 h-[50%] bg-gradient-to-b from-transparent to-white" style="transform: translate(-50%, -50%) rotate(180deg)"></div>
                        <!-- East Line -->
                        <div class="absolute top-1/2 left-1/2 w-0.5 h-[50%] bg-gradient-to-t from-transparent to-white" style="transform: translate(-50%, -50%) rotate(90deg)"></div>
                        <!-- West Line -->
                        <div class="absolute top-1/2 left-1/2 w-0.5 h-[50%] bg-gradient-to-t from-transparent to-white" style="transform: translate(-50%, -50%) rotate(270deg)"></div>
                      </div>

                      <!-- Cardinal Letters -->
                      <div class="absolute inset-0">
                        <span class="absolute top-1 left-1/2 -translate-x-1/2 text-sm font-bold text-red-500">N</span>
                        <span class="absolute bottom-1 left-1/2 -translate-x-1/2 text-sm font-bold text-white">S</span>
                        <span class="absolute top-1/2 right-1 -translate-y-1/2 text-sm font-bold text-white">E</span>
                        <span class="absolute top-1/2 left-1 -translate-y-1/2 text-sm font-bold text-white">W</span>
                      </div>

                      <!-- Center Point and Current Direction -->
                      <div class="absolute inset-0">
                        <!-- Center Circle -->
                        <div class="absolute top-1/2 left-1/2 w-2 h-2 bg-gray-400 rounded-full transform -translate-x-1/2 -translate-y-1/2"></div>
                        
                        <!-- Direction Pointer -->
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -rotate-45">
                          <!-- Line -->
                          <div class="h-[46px] w-0.5 bg-gradient-to-t from-red-600 to-red-500 origin-bottom"></div>
                          <!-- Triangle -->
                          <div class="absolute -top-1 left-1/2 w-2 h-2 bg-red-500 transform -translate-x-1/2 rotate-45"></div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Direction Label -->
                    <div class="text-center mt-3">
                      <span class="px-3 py-1 bg-gray-800 rounded-full text-red-500 text-sm font-bold">NW</span>
                    </div>
                  </div>
                  
                  <div>
                    <h3 class="text-gray-600 font-medium mb-1">Wind Gusts</h3>
                    <p class="text-2xl font-semibold text-gray-800">{{ $windGusts }} km/h</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Additional Weather Info -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
              <!-- Visibility -->
              <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                  <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                  </svg>
                  <h3 class="text-gray-600 font-medium">Visibility</h3>
                </div>
                <p class="text-xl font-semibold text-gray-800">{{ $visibility }} km</p>
              </div>

              <!-- Humidity -->
              <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                  <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                  </svg>
                  <h3 class="text-gray-600 font-medium">Humidity</h3>
                </div>
                <p class="text-xl font-semibold text-gray-800">{{ $humidity }}%</p>
              </div>

              <!-- Sunrise -->
              <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                  <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                  </svg>
                  <h3 class="text-gray-600 font-medium">Sunrise</h3>
                </div>
                <p class="text-xl font-semibold text-gray-800">6:30 AM</p>
              </div>

              <!-- Sunset -->
              <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                  <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                  </svg>
                  <h3 class="text-gray-600 font-medium">Sunset</h3>
                </div>
                <p class="text-xl font-semibold text-gray-800">8:45 PM</p>
              </div>

              <!-- Circuit Ceiling -->
              <div class="bg-white rounded-xl p-4 shadow-sm">
                <div class="flex items-center mb-2">
                  <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 9l7-7 7 7"/>
                  </svg>
                  <h3 class="text-gray-600 font-medium">Circuit Ceiling</h3>
                </div>
                <p class="text-xl font-semibold text-gray-800">13,000 ft</p>
                <p class="text-xs text-gray-500">Max altitude</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Forecast -->
        <div class="mt-8">
          <h2 class="text-2xl font-semibold text-blue-800 mb-4">Hourly Forecast</h2>
          <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($hourlyForecast as $hour)
            <div class="bg-blue-50 rounded-lg p-3 text-center">
              <p class="font-medium">{{ $hour['time'] }}</p>
              <div class="my-2">
                <span class="text-xl font-bold">{{ $hour['temp'] }}°C</span>
              </div>
              <p class="text-sm">Wind: {{ $hour['wind'] }} km/h</p>
              <p class="text-sm">Gusts: {{ $hour['gusts'] }} km/h</p>
              <p class="mt-2">
                <span class="px-2 py-1 rounded-full text-xs text-white {{ $hour['safety'] === 'Good' ? 'bg-green-500' : ($hour['safety'] === 'Moderate' ? 'bg-yellow-500' : 'bg-red-500') }}">
                  {{ $hour['safety'] }}
                </span>
              </p>
            </div>
            @endforeach
          </div>
        </div>
        
        <!-- Launch Sites -->
        <div class="mt-8">
          <h2 class="text-2xl font-semibold text-blue-800 mb-4">Launch Sites Conditions</h2>
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
              <thead>
                <tr>
                  <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Site</th>
                  <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Wind</th>
                  <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Gusts</th>
                  <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Direction</th>
                  <th class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($launchSites as $site)
                <tr>
                  <td class="py-2 px-4 border-b border-gray-200">{{ $site['name'] }}</td>
                  <td class="py-2 px-4 border-b border-gray-200">{{ $site['wind'] }} km/h</td>
                  <td class="py-2 px-4 border-b border-gray-200">{{ $site['gusts'] }} km/h</td>
                  <td class="py-2 px-4 border-b border-gray-200">{{ $site['direction'] }}</td>
                  <td class="py-2 px-4 border-b border-gray-200">
                    <span class="px-2 py-1 rounded-full text-xs text-white {{ $site['status'] === 'Good' ? 'bg-green-500' : ($site['status'] === 'Moderate' ? 'bg-yellow-500' : 'bg-red-500') }}">
                      {{ $site['status'] }}
                    </span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        
        <!-- 7-Day Forecast -->
        <div class="mt-8">
          <h2 class="text-2xl font-semibold text-blue-800 mb-4">7-Day Forecast</h2>
          <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-7 divide-y md:divide-y-0 md:divide-x divide-gray-200">
              @foreach($dailyForecast as $day)
              <div class="p-4">
                <div class="text-center">
                  <p class="font-bold text-gray-700">{{ $day['day'] }}</p>
                  <p class="text-sm text-gray-500">{{ $day['date'] }}</p>
                  <div class="my-2">
                    <span class="text-xl font-bold text-blue-900">{{ $day['highTemp'] }}°</span>
                    <span class="text-gray-500">/{{ $day['lowTemp'] }}°</span>
                  </div>
                  <div class="flex flex-col space-y-1 mt-2">
                    <div class="flex justify-between text-sm">
                      <span class="text-gray-600">Wind:</span>
                      <span>{{ $day['windSpeed'] }} km/h</span>
                    </div>
                    <div class="flex justify-between text-sm">
                      <span class="text-gray-600">Gusts:</span>
                      <span>{{ $day['windGusts'] }} km/h</span>
                    </div>
                    <div class="flex justify-between text-sm">
                      <span class="text-gray-600">Precip:</span>
                      <span>{{ $day['precipitation'] }}%</span>
                    </div>
                  </div>
                  <p class="text-xs text-gray-600 mt-2">{{ $day['description'] }}</p>
                  <div class="mt-3">
                    <span class="px-2 py-1 rounded-full text-xs text-white {{ $day['safety'] === 'Good' ? 'bg-green-500' : ($day['safety'] === 'Moderate' ? 'bg-yellow-500' : 'bg-red-500') }}">
                      {{ $day['safety'] }}
                    </span>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      
      <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-semibold text-blue-800 mb-4">Weather Safety Tips</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <h3 class="text-lg font-medium text-blue-700 mb-2">Wind Conditions</h3>
            <ul class="list-disc pl-5 space-y-1">
              <li>Ideal wind speed: 10-25 km/h</li>
              <li>Avoid flying in gusts over 30 km/h</li>
              <li>Be cautious of changing wind directions</li>
              <li>Check for turbulence and rotors near terrain</li>
            </ul>
          </div>
          <div>
            <h3 class="text-lg font-medium text-blue-700 mb-2">Visibility & Clouds</h3>
            <ul class="list-disc pl-5 space-y-1">
              <li>Maintain minimum 5km visibility</li>
              <li>Stay clear of clouds by at least 300m</li>
              <li>Watch for approaching weather fronts</li>
              <li>Be aware of valley fog development</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include("common.footer")
</body>
</html>
@endsection