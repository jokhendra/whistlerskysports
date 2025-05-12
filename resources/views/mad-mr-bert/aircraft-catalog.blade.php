@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #eaf0f7;
        font-family: Arial, sans-serif;
    }
    
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1rem 2rem;
        background-color: white;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
    }
    
    .logo-container {
        height: 60px;
    }
    
    .logo-container img {
        height: 100%;
        width: auto;
    }
    
    .contact-link {
        color: #0C345F;
        font-weight: bold;
        text-decoration: none;
        padding: 0.5rem 1rem;
        border: 2px solid #0C345F;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    
    .contact-link:hover {
        background-color: #0C345F;
        color: white;
    }
</style>

<div>
    <!-- Header -->
    <div class="header">
        <div class="logo-container">
            <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9ceefa41-24ac-430b-a72e-1bc1c1b91267/unnamed-2.jpg?format=1500w" alt="Air Creation">
        </div>
        <a href="/contact" class="contact-link">Contact Us</a>
    </div>
    
    <!-- Full-width hero image -->
    <div class="w-full mt-24">
        <img src="{{ asset('images/aircreation.png') }}" alt="Air Creation Aircraft" class="w-full h-auto">
    </div>
    
    <!-- Content section -->
    <div class="max-w-5xl mx-auto px-6 py-10">
        <div class="bg-opacity-90 p-6">
            <p class="mb-4 text-gray-800 leading-relaxed">
                Air Creation's reputation has been built on the values of quality and safety. Their exceptional performance and high standards are unmatched in the industry. Over the past 40 years Air Creation has produced over 7000 weight-shift control trikes. Blue Collar Aviation is honored to be representing the worlds highest quality and best selling trikes here in the US. We are now offering three different two seat trike kits, and one ultralight that is available "ready to Fly "or as a fast build kit. Multiple trike/wing combinations are available.
            </p>
            
            <p class="mb-4 text-gray-800 leading-relaxed">
                Now that Air Creation trikes are available in the US as kits, the price has been greatly reduced. In addition to the low kit price, the dollar to euro exchange is now very favorable. The Benchmark trikes are now very affordable.
            </p>
            
            <p class="font-semibold text-lg">
                Click on any of the trike photos below for more information.
            </p>
        </div>
    </div>
    
    <!-- Aircraft Gallery -->
    <div class="max-w-6xl mx-auto px-6 pb-12">
        <div class="flex flex-wrap -mx-3">
            <!-- Tanarg Neo -->
            <div class="w-full md:w-1/2 px-3 mb-8">
                <a href="/mad-mr-bert/tanarg-neo" class="block hover:shadow-lg transition-shadow duration-300">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664989365688-9I7GSML99RMU9AGEDKM9/Tanarg+iS+Rouge+412.JPG?format=1000w" alt="Tanarg Neo" class="w-full h-auto rounded">
                    <h3 class="text-xl font-bold mt-3 text-center">Tanarg Neo</h3>
                </a>
            </div>
            
            <!-- Skypper EVO -->
            <div class="w-full md:w-1/2 px-3 mb-8">
                <a href="/mad-mr-bert/skypper-evo" class="block hover:shadow-lg transition-shadow duration-300">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664989529417-TEXASSKFG35GZAVWIU6R/Gris+10.JPG?format=1000w" alt="Skypper EVO" class="w-full h-auto rounded">
                    <h3 class="text-xl font-bold mt-3 text-center">Skypper EVO</h3>
                </a>
            </div>
            
            <!-- Skypper Bushan -->
            <div class="w-full md:w-1/2 px-3 mb-8">
                <div class="hover:shadow-lg transition-shadow duration-300">
                    <a href="/mad-mr-bert/skypper-bushan">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664990246194-VCJQBGG7XV0HZEIPG3R7/2.JPG?format=1000w" alt="Skypper Bushan" class="w-full h-auto rounded">
                        <h3 class="text-xl font-bold mt-3 text-center">Skypper Bushan</h3>
                    </a>
                </div>
            </div>
            
            <!-- Pixel & E-Pixel Ultralight -->
            <div class="w-full md:w-1/2 px-3 mb-8">
                <div class="hover:shadow-lg transition-shadow duration-300">
                    <a href="{{ route('mad-mr-bert.pixel-ultralight') }}">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1664990006441-RVL91V2Y7EEGUPSQ06RD/PiXel+%2812%29.JPG?format=1000w" alt="Pixel & E-Pixel Ultralight" class="w-full h-auto rounded">
                        <h3 class="text-xl font-bold mt-3 text-center">Pixel & E-Pixel Ultralight</h3>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 