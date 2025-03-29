@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
@include("common.header")
<body class="bg-gradient-to-br">
  @include("common.nav")
  <div class="container mx-auto px-4 py-12 mt-10">
    <div class="max-w-5xl mx-auto">
      <h1 class="text-4xl md:text-6xl font-bold text-center mb-4 text-blue-900 bg-clip-text bg-gradient-to-r from-blue-900 to-blue-600">Weather Information</h1>
      <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">Stay informed about current conditions and forecasts for optimal flying experiences</p>

      

      <!-- Current Weather -->
      <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-8 mt-12 border border-blue-100">
        <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
          <!-- Current Weather -->
          <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-8">Current Conditions</h2>
            
            <!-- Main Temperature Display -->
            <div class="flex items-center mb-10 bg-gradient-to-r from-white to-blue-50 rounded-xl p-6 border border-blue-100">
              <div class="text-7xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-900 to-blue-600">{{ $currentTemp }}°C</div>
              <div class="ml-8 border-l pl-8 border-blue-200">
                <div class="text-2xl font-semibold text-blue-900">{{ $weatherDescription }}</div>
                <div class="text-blue-700 text-xl">Feels like {{ $feelsLike }}°C</div>
              </div>
            </div>

            <!-- Wind Information -->
            <div class="bg-gradient-to-r from-white to-blue-50 rounded-xl p-6 mb-8 border border-blue-100">
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-8">
                  <div>
                    <h3 class="text-blue-700 font-medium mb-2">Wind Speed</h3>
                    <p class="text-3xl font-bold text-blue-900">{{ $windSpeed }} km/h</p>
                  </div>
                  
                  <!-- Wind Direction Compass -->
                  <div class="relative">
                    <div class="w-32 h-32 rounded-full border-4 border-blue-900 relative bg-gradient-to-br from-blue-900 to-blue-800 overflow-hidden">
                      <!-- Degree Markers (36 marks for every 10 degrees) -->
                      @php
                        for($i = 0; $i < 36; $i++) {
                          $length = $i % 9 === 0 ? '10px' : '5px';
                          $width = $i % 9 === 0 ? '2px' : '1px';
                          echo '<div class="absolute top-1/2 left-1/2 bg-blue-400" style="width: ' . $width . '; height: ' . $length . '; transform-origin: center; transform: translate(-50%, -50%) rotate(' . ($i * 10) . 'deg) translateY(-32px);"></div>';
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
                        <span class="absolute top-2 left-1/2 -translate-x-1/2 text-sm font-bold text-red-500">N</span>
                        <span class="absolute bottom-2 left-1/2 -translate-x-1/2 text-sm font-bold text-white">S</span>
                        <span class="absolute top-1/2 right-2 -translate-y-1/2 text-sm font-bold text-white">E</span>
                        <span class="absolute top-1/2 left-2 -translate-y-1/2 text-sm font-bold text-white">W</span>
                      </div>

                      <!-- Center Point and Current Direction -->
                      <div class="absolute inset-0">
                        <!-- Center Circle -->
                        <div class="absolute top-1/2 left-1/2 w-3 h-3 bg-blue-400 rounded-full transform -translate-x-1/2 -translate-y-1/2"></div>
                        
                        <!-- Direction Pointer -->
                        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -rotate-45">
                          <!-- Line -->
                          <div class="h-[62px] w-0.5 bg-gradient-to-t from-red-600 to-red-500 origin-bottom"></div>
                          <!-- Triangle -->
                          <div class="absolute -top-1 left-1/2 w-3 h-3 bg-red-500 transform -translate-x-1/2 rotate-45"></div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- Direction Label -->
                    <div class="text-center mt-4">
                      <span class="px-4 py-2 bg-blue-900 rounded-full text-red-500 text-sm font-bold">NW</span>
                    </div>
                  </div>
                  
                  <div>
                    <h3 class="text-blue-700 font-medium mb-2">Wind Gusts</h3>
                    <p class="text-3xl font-bold text-blue-900">{{ $windGusts }} km/h</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Additional Weather Info -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
              <!-- Visibility -->
              <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-center mb-3">
                  <svg class="w-6 h-6 text-blue-700 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                  </svg>
                  <h3 class="text-blue-700 font-medium">Visibility</h3>
                </div>
                <p class="text-2xl font-bold text-blue-900">{{ $visibility }} km</p>
              </div>

              <!-- Humidity -->
              <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-center mb-3">
                  <svg class="w-6 h-6 text-blue-700 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                  </svg>
                  <h3 class="text-blue-700 font-medium">Humidity</h3>
                </div>
                <p class="text-2xl font-bold text-blue-900">{{ $humidity }}%</p>
              </div>

              <!-- Sunrise -->
              <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-center mb-3">
                  <svg class="w-6 h-6 text-blue-700 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707"/>
                  </svg>
                  <h3 class="text-blue-700 font-medium">Sunrise</h3>
                </div>
                <p class="text-2xl font-bold text-blue-900">6:30 AM</p>
              </div>

              <!-- Sunset -->
              <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-center mb-3">
                  <svg class="w-6 h-6 text-blue-700 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/>
                  </svg>
                  <h3 class="text-blue-700 font-medium">Sunset</h3>
                </div>
                <p class="text-2xl font-bold text-blue-900">8:45 PM</p>
              </div>

              <!-- Circuit Ceiling -->
              <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl p-6 border border-blue-100">
                <div class="flex items-center mb-3">
                  <svg class="w-6 h-6 text-blue-700 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 9l7-7 7 7"/>
                  </svg>
                  <h3 class="text-blue-700 font-medium">Circuit Ceiling</h3>
                </div>
                <p class="text-2xl font-bold text-blue-900">13,000 ft</p>
                <p class="text-sm text-blue-600">Max altitude</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Forecast -->
        <div class="mt-12">
          <h2 class="text-3xl font-bold text-blue-900 mb-6">Hourly Forecast</h2>
          <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            @foreach($hourlyForecast as $hour)
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-4 text-center border border-blue-100">
              <p class="font-semibold text-blue-900">{{ $hour['time'] }}</p>
              <div class="my-3">
                <span class="text-2xl font-bold text-blue-900">{{ $hour['temp'] }}°C</span>
              </div>
              <p class="text-sm text-blue-700">Wind: {{ $hour['wind'] }} km/h</p>
              <p class="text-sm text-blue-700">Gusts: {{ $hour['gusts'] }} km/h</p>
              <p class="mt-3">
                <span class="px-3 py-1 rounded-full text-sm font-semibold text-white {{ $hour['safety'] === 'Good' ? 'bg-green-500' : ($hour['safety'] === 'Moderate' ? 'bg-yellow-500' : 'bg-red-500') }}">
                  {{ $hour['safety'] }}
                </span>
              </p>
            </div>
            @endforeach
          </div>
        </div>
        
        <!-- Launch Sites -->
        <div class="mt-12">
          <h2 class="text-3xl font-bold text-blue-900 mb-6">Launch Sites Conditions</h2>
          <div class="overflow-x-auto rounded-xl border border-blue-100">
            <table class="min-w-full">
              <thead>
                <tr class="bg-gradient-to-r from-blue-50 to-white">
                  <th class="py-4 px-6 text-left text-sm font-semibold text-blue-900">Site</th>
                  <th class="py-4 px-6 text-left text-sm font-semibold text-blue-900">Wind</th>
                  <th class="py-4 px-6 text-left text-sm font-semibold text-blue-900">Gusts</th>
                  <th class="py-4 px-6 text-left text-sm font-semibold text-blue-900">Direction</th>
                  <th class="py-4 px-6 text-left text-sm font-semibold text-blue-900">Status</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-blue-100">
                @foreach($launchSites as $site)
                <tr class="bg-white hover:bg-blue-50 transition-colors duration-200">
                  <td class="py-4 px-6 text-blue-900">{{ $site['name'] }}</td>
                  <td class="py-4 px-6 text-blue-900">{{ $site['wind'] }} km/h</td>
                  <td class="py-4 px-6 text-blue-900">{{ $site['gusts'] }} km/h</td>
                  <td class="py-4 px-6 text-blue-900">{{ $site['direction'] }}</td>
                  <td class="py-4 px-6">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold text-white {{ $site['status'] === 'Good' ? 'bg-green-500' : ($site['status'] === 'Moderate' ? 'bg-yellow-500' : 'bg-red-500') }}">
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
        <div class="mt-12">
          <h2 class="text-3xl font-bold text-blue-900 mb-6">7-Day Forecast</h2>
          <div class="bg-gradient-to-br from-white to-blue-50 rounded-xl border border-blue-100 overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-7 divide-y md:divide-y-0 md:divide-x divide-blue-100">
              @foreach($dailyForecast as $day)
              <div class="p-6">
                <div class="text-center">
                  <p class="font-bold text-blue-900">{{ $day['day'] }}</p>
                  <p class="text-sm text-blue-600">{{ $day['date'] }}</p>
                  <div class="my-3">
                    <span class="text-2xl font-bold text-blue-900">{{ $day['highTemp'] }}°</span>
                    <span class="text-blue-600">/{{ $day['lowTemp'] }}°</span>
                  </div>
                  <div class="flex flex-col space-y-2 mt-3">
                    <div class="flex justify-between text-sm">
                      <span class="text-blue-700">Wind:</span>
                      <span class="text-blue-900">{{ $day['windSpeed'] }} km/h</span>
                    </div>
                    <div class="flex justify-between text-sm">
                      <span class="text-blue-700">Gusts:</span>
                      <span class="text-blue-900">{{ $day['windGusts'] }} km/h</span>
                    </div>
                    <div class="flex justify-between text-sm">
                      <span class="text-blue-700">Precip:</span>
                      <span class="text-blue-900">{{ $day['precipitation'] }}%</span>
                    </div>
                  </div>
                  <p class="text-sm text-blue-700 mt-3">{{ $day['description'] }}</p>
                  <div class="mt-4">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold text-white {{ $day['safety'] === 'Good' ? 'bg-green-500' : ($day['safety'] === 'Moderate' ? 'bg-yellow-500' : 'bg-red-500') }}">
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
      
      <!-- <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-8 border border-blue-100">
        <h2 class="text-3xl font-bold text-blue-900 mb-6">Weather Safety Tips</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100">
            <h3 class="text-xl font-semibold text-blue-900 mb-4">Wind Conditions</h3>
            <ul class="space-y-3">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Ideal wind speed: 10-25 km/h</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Avoid flying in gusts over 30 km/h</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Be cautious of changing wind directions</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Check for turbulence and rotors near terrain</span>
              </li>
            </ul>
          </div>
          <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl p-6 border border-blue-100">
            <h3 class="text-xl font-semibold text-blue-900 mb-4">Visibility & Clouds</h3>
            <ul class="space-y-3">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Maintain minimum 5km visibility</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Stay clear of clouds by at least 300m</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Watch for approaching weather fronts</span>
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                <span class="text-blue-700">Be aware of valley fog development</span>
              </li>
            </ul>
          </div>
        </div>
      </div> -->
      <!-- Weather Information Box -->
      <div class="bg-gradient-to-br from-white to-blue-50 rounded-2xl p-8 mt-12 border border-blue-100">
        <h2 class="text-3xl font-bold text-blue-900 mb-6 flex items-center">
          <span class="inline-block mr-3 p-2 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </span>
          Pemberton Weather
        </h2>
        <div class="prose max-w-none text-gray-700">
          <p class="mb-6 text-lg">The weather is important, few clouds and light winds are ideal for skydiving but are not always the case.</p>
          
          <div class="bg-gradient-to-r from-red-50 to-red-100 border-l-4 border-red-500 p-6 mb-6 rounded-r-xl">
            <p class="font-semibold text-red-900 text-lg">We do not skydive in:</p>
            <ul class="list-none mt-3 space-y-2">
              <li class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Strong, gusting winds
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Low solid cloud ceiling
              </li>
              <li class="flex items-center">
                <svg class="w-5 h-5 text-red-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                Rain conditions
              </li>
            </ul>
          </div>

          <p class="mb-6 text-lg">If we need to cancel due to the weather you can reschedule for another time and date or you will get a full refund.</p>
          
          <div class="bg-gradient-to-r from-blue-50 to-blue-100 border-l-4 border-blue-500 p-6 mb-6 rounded-r-xl">
            <p class="text-blue-900">The weather can change so quickly here in the mountains and we cannot confidently rely on the weather forecast. Our qualified staff will make a weather evaluation on the day of the jump.</p>
          </div>

          <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 border-l-4 border-yellow-500 p-6 rounded-r-xl">
            <p class="text-yellow-900"><strong>Important:</strong> If you are concerned about the weather forecast for the day of your booking and wish to reschedule or get a refund, our normal cancellation policy applies.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  @include("common.footer")
</body>
</html>
@endsection