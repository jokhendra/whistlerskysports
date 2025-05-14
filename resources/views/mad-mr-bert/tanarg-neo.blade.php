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
                <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight">Tanarg Neo</h1>
                <p class="text-xl md:text-2xl text-[rgb(255,220,220)] mb-8">Cross Country In Comfort</p>
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
                <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/fd3d3627-28e7-4f10-8265-dba2dc645f20/Tanarg%2Bneo%2Bpresentation-EN.jpg?format=2500w" alt="Tanarg Neo Presentation" class="w-full h-auto rounded-lg mb-8">
                
                <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-[rgb(241,97,98)]">
                    <p class="text-gray-800 text-lg leading-relaxed">
                        <strong class="text-[rgb(241,97,98)]">Cross Country In Comfort</strong><br>
                        The flagship of the Air Creation lineup is the Tanarg neo trike equipped with the BinoiX² wing. This trike and wing combination provides you with an amazing "hands off" speed range of 50 -90 mph, allowing you to fly slow with the ultralights, or trim for speed on that long cross country. The BioniX² wing now has a maximum take-weight of 1044lbs, it has been optimized for heavy loads providing perfect harmony with the Tanarg neo's large baggage and fuel carrying capacity. 
                        The BioniX²'s short take-off and slow flight aptitudes combined with the robustness, stability and braking efficiency of the Tanarg neo provide a truly unique "off-road" capability. This combination caters to serious adventure and travel.
                    </p>
                </div>
            </div>
            
            <!-- Specifications Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Specifications & Options</h2>
                <div class="space-y-8">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/52c12cf1-23b1-4a06-904c-448fec98e46b/Tanarg+neo+2019+options+%26+color+EN+RV-page-001+%284%29.jpg?format=2500w" alt="Tanarg Neo 2019 Options" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b08ff4e8-388f-4161-adbd-ceb98034b94d/Tanarg+neo+2019+options+%26+color+EN+RV-page-002.jpg?format=2500w" alt="Tanarg Neo 2019 Options" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/4c17fffb-c6ad-4fc4-ad06-bcdf67b57d59/Tanarg+912+neo+IS+presentation+EN.jpg?format=2500w" alt="Tanarg Neo 2019 Options" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/acdd4e22-e4ee-4d22-a9a8-fb7583d59791/Tanarg+912+neo+IS+presentation+EN2J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/3a02de3a-d806-48e2-8682-e34ce396f983/BIONIX2-Fifteen-EN-2024P1J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/9659ff52-3743-4a80-bca7-71f2ad874db5/BIONIX2-Fifteen-EN-2024P2J.jpg?format=2500w" alt="Tanarg Neo 2019 Options" class="w-full h-auto rounded-lg">
                </div>
            </div>
            
            <!-- Gallery Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Tanarg Neo Gallery</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/a3d414ba-5e91-4b3c-afdd-a92c1ec4b42b/Tanarg+Neo+Blaze-+Bleu_0089.JPG?format=2500w" alt="Tanarg Neo Blaze Blue" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/6a444c53-e4f6-4182-97aa-c16817bf5507/Tanarg+neo+Explorer_0253.JPG?format=2500w" alt="Tanarg Neo Explorer" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/c8478646-9b2f-4194-9797-054967c25d18/Vol+tanarg+ne%CC%81o.JPG?format=2500w" alt="Vol Tanarg Neo" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/354ce949-b367-4288-b10d-f7759e535ab6/Tanarg+iS+Rouge+434.JPG?format=2500w" alt="Tanarg iS Rouge" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b6dd517e-4c8f-49ae-ba63-00244897828d/3+Neo+%281%29-c.JPG?format=2500w" alt="Neo 1" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/701f0df6-746c-427b-bf3f-d0aac7b3211c/3+Neo+%283%29.JPG?format=2500w" alt="Neo 3" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/39bcfaaf-4d66-4033-96ea-8603345c78a3/Tanarg+iS+Rouge+412.jpg?format=2500w" alt="Tanarg iS Rouge 412" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/b2b6cf8c-68a8-4cea-8d02-bd4ed172c228/Tanarg+iS+Rouge+415.JPG?format=2500w" alt="Tanarg iS Rouge 415" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/05451308-c927-45cc-b001-217da08f6bbc/BioniX%C2%B2+pap.+n-r-j_0022+-+C.JPG?format=2500w" alt="BioniX² pap" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/47b3feae-e92e-4467-aea4-0c5771e8af54/Bio%C2%B2+Jessie-c.JPG?format=2500w" alt="Bio² Jessie" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/ff05181c-aa07-4d91-916a-04cbf937ec64/BioniX%C2%B2+perso+bleue+1-C.jpg?format=2500w" alt="BioniX² perso bleue" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/02210d0b-b809-4871-ab2a-9712d0ef477f/BioniX%C2%B2+pap.rose+-+C.JPG?format=2500w" alt="BioniX² pap.rose" class="w-full h-64 object-cover">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/e581be42-b07a-4d09-ba7c-f61ee3001618/BioniX%C2%B2+SpiritsUp+17-3.jpg?format=2500w" alt="BioniX² SpiritsUp" class="w-full h-64 object-cover">
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden">
                        <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/eedc7e8c-d2ce-4a67-b621-2cd2a52c7ebf/BioniX%C2%B2+Perso+J%26N_0021.jpg?format=2500w" alt="BioniX² Perso J&N" class="w-full h-64 object-cover">
                    </div>
                </div>
            </div>
            
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/74485d93-84bd-410f-8d44-3b08303ec359/Screen+Shot+2022-10-19+at+9.36.28+AM.png?format=2500w" alt="Tanarg Neo Screenshot" class="w-full h-auto rounded-lg">
            </div>
            
            <!-- Video Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Watch Tanarg Neo in Action</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/jc4Su-WuZeg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/1pZuLHDyPz0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/x9cn2esV5Es" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                    <div class="bg-white p-2 rounded-lg shadow-sm overflow-hidden">
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.youtube.com/embed/MOs_oUgiz2Y" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pricing Section -->
            <div class="mb-12 bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-[rgb(241,97,98)]">Pricing & Kit Information</h2>
                <div class="space-y-8">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/113356f8-2362-4c5f-9576-194e1be192a5/Kit+Tanarg+P1J.jpg?format=2500w" alt="Tanarg Neo Kit Page 1" class="w-full h-auto rounded-lg">
                    <img src="https://images.squarespace-cdn.com/content/v1/633db25e620fd8156fd40b68/0f9dcbf7-49ee-45c2-823a-08bd88d6e954/Kit+Tanarg+P2J.jpg?format=2500w" alt="Tanarg Neo Kit Page 2" class="w-full h-auto rounded-lg">
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