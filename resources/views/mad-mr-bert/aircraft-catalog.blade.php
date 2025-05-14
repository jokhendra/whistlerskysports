@extends('layouts.app')

@section('content')
<div class="pt-16 lg:pt-24 md:pt-24">
    <!-- Hero Section with Animated Background -->
    <div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-16 sm:py-20 overflow-hidden">
        <!-- Animated Background Elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-16 -left-16 w-64 h-64 bg-white opacity-5 rounded-full"></div>
            <div class="absolute top-1/3 right-1/4 w-40 h-40 bg-white opacity-5 rounded-full"></div>
            <div class="absolute bottom-0 left-1/3 w-80 h-80 bg-white opacity-5 rounded-full"></div>
            <div class="absolute -bottom-20 -right-20 w-72 h-72 bg-white opacity-5 rounded-full"></div>
        </div>
        
        <div class="container mx-auto px-4 relative z-10">
            <div class="max-w-4xl mx-auto text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight">Aircraft Catalog</h1>
                <p class="text-xl md:text-2xl text-[rgb(255,220,220)] mb-8">Premium Ultralight Aircraft by Air Creation</p>
                <div class="logo-container flex justify-center">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9ceefa41-24ac-430b-a72e-1bc1c1b91267/unnamed-2.jpg?format=1500w" alt="Air Creation" class="h-16 bg-white p-2 rounded shadow-lg">
                </div>
            </div>
        </div>
        
        <!-- Wave Shape Divider -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none" class="text-white fill-current w-full h-16">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
                <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"></path>
            </svg>
        </div>
    </div>
    
    <!-- Navigation Links -->
    <div class="bg-gray-100 shadow-md">
        <div class="container mx-auto px-4">
            <div class="flex justify-center py-4 space-x-6">
                <a href="/contact" class="text-gray-800 hover:text-[rgb(241,97,98)] font-medium transition-colors duration-300">Contact Us</a>
                <a href="/mad-mr-bert" class="text-gray-800 hover:text-[rgb(241,97,98)] font-medium transition-colors duration-300">MAD Mr Bert's</a>
            </div>
        </div>
    </div>
    
    <!-- Full-width hero image -->
    <div class="w-full bg-white py-8">
        <img src="{{ asset('images/aircreation.png') }}" alt="Air Creation Aircraft" class="w-full h-auto max-w-6xl mx-auto">
    </div>
    
    <!-- Content section -->
    <div class="bg-white py-8">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-gray-50 p-8 rounded-lg shadow-sm border border-gray-200">
                <p class="mb-4 text-gray-800 leading-relaxed">
                    Air Creation's reputation has been built on the values of quality and safety. Their exceptional performance and high standards are unmatched in the industry. Over the past 40 years Air Creation has produced over 7000 weight-shift control trikes. Blue Collar Aviation is honored to be representing the worlds highest quality and best selling trikes here in the US. We are now offering three different two seat trike kits, and one ultralight that is available "ready to Fly "or as a fast build kit. Multiple trike/wing combinations are available.
                </p>
                
                <p class="mb-6 text-gray-800 leading-relaxed">
                    Now that Air Creation trikes are available in the US as kits, the price has been greatly reduced. In addition to the low kit price, the dollar to euro exchange is now very favorable. The Benchmark trikes are now very affordable.
                </p>
                
                <p class="font-semibold text-lg text-[rgb(241,97,98)]">
                    Click on any of the trike photos below for more information.
                </p>
            </div>
        </div>
    </div>
    
    <!-- Aircraft Gallery -->
    <div class="bg-white py-8 pb-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Tanarg Neo -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                    <a href="/mad-mr-bert/tanarg-neo" class="block">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664989365688-9I7GSML99RMU9AGEDKM9/Tanarg+iS+Rouge+412.JPG?format=1000w" alt="Tanarg Neo" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-center text-gray-900">Tanarg Neo</h3>
                        </div>
                    </a>
                </div>
                
                <!-- Skypper EVO -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                    <a href="/mad-mr-bert/skypper-evo" class="block">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664989529417-TEXASSKFG35GZAVWIU6R/Gris+10.JPG?format=1000w" alt="Skypper EVO" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-center text-gray-900">Skypper EVO</h3>
                        </div>
                    </a>
                </div>
                
                <!-- Skypper Bushan -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                    <a href="/mad-mr-bert/skypper-bushan" class="block">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664990246194-VCJQBGG7XV0HZEIPG3R7/2.JPG?format=1000w" alt="Skypper Bushan" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-center text-gray-900">Skypper Bushan</h3>
                        </div>
                    </a>
                </div>
                
                <!-- Pixel & E-Pixel Ultralight -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:shadow-xl hover:-translate-y-1">
                    <a href="{{ route('mad-mr-bert.pixel-ultralight') }}" class="block">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664990006441-RVL91V2Y7EEGUPSQ06RD/PiXel+%2812%29.JPG?format=1000w" alt="Pixel & E-Pixel Ultralight" class="w-full h-64 object-cover">
                        <div class="p-4">
                            <h3 class="text-xl font-bold text-center text-gray-900">Pixel & E-Pixel Ultralight</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bottom Navigation -->
    <div class="bg-gray-100 py-8">
        <div class="container mx-auto px-4">
            <div class="text-center">
                <div class="h-1 bg-gradient-to-r from-[rgb(241,97,98,0.1)] via-[rgb(241,97,98)] to-[rgb(241,97,98,0.1)] rounded mb-6"></div>
                <div class="flex justify-center py-4 space-x-6">
                    <a href="/contact" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] font-medium transition-colors duration-300">Contact Us</a>
                    <a href="/mad-mr-bert" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] font-medium transition-colors duration-300">MAD Mr Bert's</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 