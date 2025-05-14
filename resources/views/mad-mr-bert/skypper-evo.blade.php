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
                <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight">Skypper EVO</h1>
                <p class="text-xl md:text-2xl text-[rgb(255,220,220)] mb-8">A Rugged and Sporty Flying Motorcycle</p>
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
                <a href="/mad-mr-bert/aircraft-catalog" class="text-gray-800 hover:text-[rgb(241,97,98)] font-medium transition-colors duration-300">Aircraft Catalog</a>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="bg-white py-8">
        <div class="max-w-6xl mx-auto px-6">
            <!-- Introduction Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/01842019-bd0f-4fa0-9f1c-4f3ddbd9b972/iFun16%2BSP-EN.jpg?format=2500w" alt="iFun16 SP" class="w-full h-auto rounded-lg mb-8">
                <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/560b36ba-56bb-4c0a-9364-84c2e7f2fe7a/skypper+EVO+2022+EN-LOW.jpg?format=2500w" alt="Skypper EVO 2022 EN LOW" class="w-full h-auto rounded-lg mb-8">
                <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/230cfc76-797f-4496-be66-16afd4978c6d/skypper+EVO+2022+EN-LOW2J.jpg?format=2500w" alt="Skypper EVO 2022 EN LOW 2" class="w-full h-auto rounded-lg mb-8">
                
                <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-[rgb(241,97,98)]">
                    <p class="text-gray-800 text-lg leading-relaxed">
                        <strong class="text-[rgb(241,97,98)]">A Rugged and Sporty Flying Motorcycle</strong><br>
                        The Air Creation Skypper EVO is strong and light with its modern truss frame. The Skypper EVO is also powerful with its 80 or optional 100hp Rotax engine. This motorcycle of the sky can be set up with a full front fairing or flown naked with the stock windshield and instrument cluster. With the iFun 16SP, the Skypper's wing can be easily folded and stored in the corner of a hangar or in an enclosed trailer. If more speed is what you are after, the Skypper can be equipped with either the NuviX or BioniX² wings. The Air Creation Skypper is an affordable trike that does it all.
                    </p>
                </div>
            </div>
            
            <!-- Gallery Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Skypper EVO Gallery</h2>
                
                <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/171d57ad-767d-4928-a92d-cffe66bd68a8/iFun16%2BSP%2B2-EN.jpg?format=2500w" alt="iFun16 SP 2" class="w-full h-auto rounded-lg mb-8">
            
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/2981e6c0-63ea-48f9-b517-bbb1f292a4e7/Sol_Skypper_evo.JPG?format=2500w" alt="Sol Skypper Evo" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/11018d2f-7000-4152-b654-c6114e5b8f99/Gris+6.JPG?format=2500w" alt="Gris 6" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/d4eff573-07c0-45f8-8493-734aca3257b2/Gris+8.JPG?format=2500w" alt="Gris 8" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/83676d5b-67a2-4186-9d6e-a274feebe74c/Gris+7.JPG?format=2500w" alt="Gris 7" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/1a8c3894-6e49-4598-9945-ab5895a695bc/4+Skypper+sol+%284%29.JPG?format=2500w" alt="Skypper Sol" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9dd18251-66dd-4ff9-9b88-b1af994f5f61/Skypper+EVO+iS+%284%29.JPG?format=2500w" alt="Skypper EVO iS" class="w-full h-64 object-cover">
                    </div>
                </div>
            </div>
            
            <!-- Video Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Watch Skypper EVO in Action</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/QnqeGf9jFKc" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/6zGB30wKOcs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/Oz2ZpaMmDDM" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/edIngHIdEWU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pricing Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Pricing & Specifications</h2>
                <div class="space-y-8">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/5bcfd866-1c3c-40e5-a658-f7ccefc461a0/Skypper+24+Price+P1J.jpg?format=2500w" alt="Skypper EVO Price 1" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/ba6fd1a7-be52-41d2-940a-6cb9c22832dd/Kit+Skypper+Price+P2J.jpg?format=2500w" alt="Skypper EVO Price 2" class="w-full h-auto rounded-lg">
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
                    <a href="/mad-mr-bert/aircraft-catalog" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] font-medium transition-colors duration-300">Back to Catalog</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 