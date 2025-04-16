@extends('layouts.app')

@section('content')
<div class="relative bg-gradient-to-b from-sky-100/90 mt-10 to-white/80 py-16">
    <!-- Hero Section with Background Image -->
    <!-- <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/pwg1.jpg') }}" alt="Hang Gliding Experience" class="w-full h-full object-cover opacity-20">
    </div> -->

    <div class="relative z-10 container mx-auto px-4">
        <!-- Main Title Section -->
        <div class="text-center mb-16 bg-white/30 rounded-xl p-8">
            <h1 class="text-4xl md:text-5xl font-bold text-[#204fb4] mb-6 relative z-20 text-shadow-lg">
                <span class="bg-gradient-to-r from-[#204fb4] to-[#204fb4] bg-clip-text text-transparent relative">
                    Your Introduction to the most "Bird Like" flying experience in aviation!
                </span>
            </h1>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto font-medium">
                Flying a trike is a completely different type of flying experience. Where else can you feel the wind in your hair and your knees in the breeze as you enjoy a personal one-on-one flying experience? During your flight we will shoot professional quality photos and video of your flight.... perfect for bragging rights back home.
            </p>
        </div>

        <!-- Lesson Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-7xl mx-auto mb-20">
            <!-- 30 Minute Lesson Package -->
            <div class="bg-white/40 rounded-2xl overflow-hidden">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Open Cockpit Weight Shift Trike - Learn to Fly like a Bird</h2>
                    <div class="text-4xl font-bold text-[#204fb4] mb-2">CA$229</div>
                    <p class="text-gray-600 mb-4">per person</p>
                    <p class="text-xl text-gray-700 mb-6">30 Minute Lesson</p>
                    <p class="text-lg text-gray-600 mb-8">Spread your wings and reach out to the sky!</p>
                    <a href="{{ route('booking') }}" class="inline-block bg-[#204fb4] text-[#fcdb3f] font-bold py-3 px-8 rounded-full hover:bg-[#204fb4] transition duration-300 transform hover:scale-105">
                        RESERVE
                    </a>
                </div>
            </div>

            <!-- Mountain Flying Course Package -->
            <div class="bg-white/40 rounded-2xl overflow-hidden">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Fixed Wing Advanced Ultralight - Lesson for the Nuanced </h2>
                    <div class="text-4xl font-bold text-[#204fb4] mb-2">CA$199</div>
                    <p class="text-gray-600 mb-4">per person</p>
                    <p class="text-xl text-gray-700 mb-6">30 Minute Lesson</p>
                    <p class="text-lg text-gray-600 mb-8">Master the art of mountain flying with our comprehensive course!</p>
                    <a href="{{ route('booking') }}" class="inline-block bg-[#204fb4] text-[#fcdb3f] font-bold py-3 px-8 rounded-full hover:bg-[#204fb4] transition duration-300 transform hover:scale-105">
                        RESERVE
                    </a>
                </div>
            </div>
            
            <!-- Comprehensive Flight Training Programs -->
            <div class="bg-white/40 rounded-2xl overflow-hidden">
                <div class="p-8 text-center">
                    <h2 class="text-3xl font-bold mb-2">Comprehensive Flight Training Programs</h2>
                    <!-- <div class="text-4xl font-bold text-purple-600 mb-2">From CA$3,995</div> -->
                    <p class="text-gray-600 mb-4">complete program</p>
                    <p class="text-xl text-gray-700 mb-6">Transport Canada Approved</p>
                    <p class="text-lg text-gray-600 mb-8">From Basic Ultralight to Recreational Pilot Permit - structured programs designed to take you from beginner to certified pilot.</p>
                    <a href="#comprehensive-programs" class="inline-block bg-[#204fb4] text-[#fcdb3f] font-bold py-3 px-8 rounded-full hover:bg-[#204fb4] transition duration-300 transform hover:scale-105 smooth-scroll">
                        LEARN MORE
                    </a>
                </div>
            </div>
        </div>

        <!-- Memories Section -->
        <div class="mb-12 text-center">
            <h2 class="text-4xl font-bold text-[#204fb4] mb-8">Memories</h2>
        </div>

        <!-- Memory Packages Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-7xl mx-auto">
            <!-- Video Package -->
            <div class="bg-white/30 rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Video</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        High definition video of your entire flight with cockpit audio capturing all the excitement and information during your flight.
                    </p>
                    <div class="text-2xl font-bold text-[#204fb4]">CA$90</div>
                </div>
            </div>

            <!-- Deluxe Package -->
            <div class="bg-white/30 rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Deluxe</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        Photos, Video and a WhistlerSkySports Cap or shirt and Keyring
                    </p>
                    <div class="text-2xl font-bold text-[#204fb4]">CA$120</div>
                </div>
            </div>

            <!-- Merchandise Package -->
            <div class="bg-white/30 rounded-xl overflow-hidden transition-transform duration-300 hover:scale-105">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Merchandise</h3>
                    <p class="text-gray-600 text-sm mb-6">
                        WhistlerSkySports Cap or shirt and Keyring
                    </p>
                    <div class="text-2xl font-bold text-[#204fb4]">CA$40</div>
                </div>
            </div>
        </div>
        
        <!-- Safety Message Section -->
        <div class="max-w-4xl mx-auto mt-16 mb-8 bg-white/30 rounded-xl p-8 text-center">
            <h2 class="text-3xl font-bold text-[#204fb4] mb-6">Ready to soar?</h2>
            <p class="text-lg text-gray-700 leading-relaxed">
                Your first flight lesson is a thrilling step, and we're here to ensure you're confident and prepared! We believe a little knowledge goes a long way when it comes to safe flying. While you can jump straight to pricing if you're eager, we highly recommend taking just 5 minutes to breeze through our <a href="{{ route('faq') }}" class="text-purple-600 font-semibold hover:text-purple-800 underline">FAQ page</a>. It's packed with essentials that could make all the difference. After all, it's not money that keeps us safe in the skies—it's your skills and know-how. Let's make every flight a safe adventure together!
            </p>
        </div>
        
        <!-- Open Cockpit Trike Description Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-[#204fb4] mb-6 text-center">Embark on an Unforgettable Adventure with Open Cockpit Trikes!</h2>
            <div class="bg-white/30 rounded-xl p-8">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Ready to feel the wind in your hair and the thrill of flight? Our introductory and comprehensive flight lessons on Basic Ultralight Aircraft (BULA) is your ticket to the skies! Our 30-minute introductory flight is the perfect way to dip your toes into aviation. You will get a sense of basic maneuvers, learn to fly straight and level, and get a taste of navigation—all while soaking in jaw-dropping landscape views that'll leave you speechless. Mistakes? Totally welcome! This is your no-pressure chance to see if flying is your passion. Trust me – I made tons of mistakes. So don't feel low and don't judge yourself:- that's my work😊
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    We're all about freedom and fun, so we encourage you to fly only if it sparks joy. Parents, we love your enthusiasm, but let's make sure your kids are genuinely excited to take flight—peer pressure's not our vibe. A happy, self-motivated flyer makes for the best memories (and we've got plenty of those to share—lol!).
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Now, let's talk about our pride and joy: These open cockpit Trikes, aka air-bikes! These bad boys are a rare thrill, and we're stoked to offer training on them. Our Chief Flight Instructor, Ishan, lives by the motto that giving is everything—and trust us, there's nothing like giving you the keys to the Whistler skies in these unique aircraft. They're tricky to master (hello, Murphy's Law!), but with our expert preflight briefs and checks, you'll be ready to conquer the challenge. Plus, you control the pace—go as fast, as far and as high as feels right for you!
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed">
                    Our 30-minute flight lessons are designed to give you just enough to know if this sport's your calling. Want to try again? Go for it! But one flight's usually all it takes to catch the bug. Best part? You pay when you land—because we're all about happy landings and epic experiences. So, what are you waiting for? Come chase the horizon with us and make memories that'll last a lifetime! ✨ Book your flight today!
                </p>
            </div>
        </div>
        
        <!-- Fixed-Wing Aircraft Description Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-[#204fb4] mb-6 text-center">Introductory Flight Lesson on Fixed-Wing Aircraft</h2>
            <div class="bg-white/30 rounded-xl p-8">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Embark on a thrilling journey with our introductory flight lessons tailored for every aviation enthusiast, including seasoned PPL holders! Our highly skilled Flight Instructor, passionate about teaching across various aircraft types, ensures a seamless experience. Whether you're transitioning from heavier aircraft to ultralights or moving from weight-shift trikes, we strongly recommend professional training on advanced ultralights—either with us or another trusted provider. Skipping proper conversion training could risk not just your safety but also the lives of those who fly with you. Think of this as a small investment in your long-term safety and uninterrupted flying adventures with students or loved ones.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    We warmly welcome all pilots—recreational, ultralight, free flyers, or multi-engine commercial—while keeping safety first. Our structured approach guarantees best practices, minimizing errors that could lead to serious consequences. Rest assured, our goal isn't to alarm you but to ensure your comfort and confidence throughout the lesson. Enjoy a 30-minute introductory flight lesson with stunning alpine views soaring beside you! Payment is only required after successfully completing your flight.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed">
                    Looking for a unique gift? Pre-book a flight for your loved ones! Note that flights are subject to cancellation based on weather conditions or aircraft availability.
                </p>
            </div>
        </div>
        
        <!-- Comprehensive Flight Training Programs Description Section -->
        <div id="comprehensive-programs" class="max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl font-bold text-[#204fb4] mb-6 text-center">Exciting Comprehensive Flight Training Programs Await You!</h2>
            <div class="bg-white/30 rounded-xl p-8">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Our year-round comprehensive flight training programs are designed for passionate aviation enthusiasts ready to soar to new heights! We ask for a solid commitment from our students to ensure success. Before you even step foot on the tarmac, you'll dive into engaging study materials and captivating videos to prepare for the journey ahead.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Don't expect to kick things off with a thrilling flight lesson like in our intro courses—our training begins with building a strong foundation. You'll get up close and personal with your aircraft, exploring the heart of the machine (the engine!) and the anatomy of its wings. From there, you'll tackle ground lessons, master pre-safety checks, and finally take to the skies for the moment you've been waiting for: your in-flight lesson! This structured approach ensures we cover every detail, filling any gaps in your aviation knowledge.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    For those pursuing an Ultralight permit or Instructor ratings (BULA or AULA), all flight lessons require payment in advance.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-4">
                    We've seen three types of learners take flight with us:
                </p>
                
                <ul class="list-disc pl-6 mb-6 text-lg text-gray-700 leading-relaxed">
                    <li class="mb-2"><span class="font-semibold">QL (Quick Learners):</span> They grasp concepts fast and zoom through the program.</li>
                    <li class="mb-2"><span class="font-semibold">AL (Average Learners):</span> They progress steadily, hitting milestones with confidence.</li>
                    <li class="mb-2"><span class="font-semibold">LL (Long Learners):</span> They take their time, ensuring every detail sinks in.</li>
                </ul>
                
                <p class="text-lg text-gray-700 leading-relaxed">
                    Each category comes with its own pricing structure, tailored to your learning pace—details are outlined below!
                </p>
            </div>
        </div>

        <!-- Quick Learners (QL) Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <h3 class="text-2xl font-bold text-[#204fb4] mb-6 text-center">QL: Quick Learners – The High-Flying Adventurers!</h3>
            <div class="bg-white/30 rounded-xl p-8">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Quick Learners (QL) are often athletes with lean, agile builds, thriving in high-energy sports like skydiving, skiing, snowboarding, and more. These adrenaline enthusiasts bring lightning-fast reflexes and sharp motor skills to the cockpit, making them natural fits for flight training. With the right guidance, they can transform into exceptional pilots, mastering the skies with ease.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    But here's a vital heads-up: even the strongest swimmers can face risks if they're not careful, and the same goes for our quick learners, especially younger thrill-seekers. Flying demands focus and discipline, not reckless boundary-pushing. This isn't about piloting fighter jets—it's a recreational sport that calls for maturity and deep respect for both the aircraft and yourself. If you're chasing extreme adventure, other outlets might better suit your vibe.
                </p>

                <p class="text-xl font-semibold text-[#204fb4] mb-4 text-center">
                    For QL students, our training is tailored to harness your potential while keeping safety first.
                </p>

                <!-- Pricing Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white/50 rounded-lg overflow-hidden">
                        <thead class="bg-[#204fb4] text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Task or Item</th>
                                <th class="px-4 py-3 text-center">Time</th>
                                <th class="px-4 py-3 text-center">Cost</th>
                                <th class="px-4 py-3 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Dual Time With Instructor</td>
                                <td class="px-4 py-3 text-center">22</td>
                                <td class="px-4 py-3 text-center">CAD299</td>
                                <td class="px-4 py-3 text-right">CAD6,578.00</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">Flight Brief/ Debrief and Ground School Lesson Review with CFI</td>
                                <td class="px-4 py-3 text-center">22</td>
                                <td class="px-4 py-3 text-center">CAD99.7</td>
                                <td class="px-4 py-3 text-right">CAD2,192.67</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Solo Flight Time</td>
                                <td class="px-4 py-3 text-center">5</td>
                                <td class="px-4 py-3 text-center" colspan="2">Use Own Aircraft</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">Solo Flight Ground Instruction</td>
                                <td class="px-4 py-3 text-center">2</td>
                                <td class="px-4 py-3 text-center">CAD99.7</td>
                                <td class="px-4 py-3 text-right">CAD199.33</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Ground School for the Aeronautical Flight, FAA Knowledge test and Checkride</td>
                                <td class="px-4 py-3 text-center">40</td>
                                <td class="px-4 py-3 text-center" colspan="2">self study</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">FAA Knowledge Test</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD50.00</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Checkride</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD350.00</td>
                            </tr>
                            <tr class="bg-purple-100/50 font-bold">
                                <td class="px-4 py-3">Total</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD9,370.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-sm text-gray-600 mt-4 italic">
                    Note: If you show up with your own Trike, reduce the cost of CFI from CAD 299 to CAD 199
                </p>
            </div>
        </div>

        <!-- Average Learners (AL) Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <h3 class="text-2xl font-bold text-[#204fb4] mb-6 text-center">AL: Average Learners – The Steady Path to Stellar Pilots!</h3>
            <div class="bg-white/30 rounded-xl p-8">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Average Learners (AL) are the heart and soul of our program—folks just like us who've dabbled in sports at some point in their lives, from weekend soccer games to high school track. These learners move through life at a comfortable pace, embracing each moment as it comes. With solid reflexes and a cooperative spirit, they dive into training with enthusiasm and adaptability.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    This is my favorite group, and here's why: ALs often become some of the finest pilots! They bring a grounded, respectful mindset to the cockpit, steering clear of reckless stunts or risky aerobatics. With a deep appreciation for safety, they handle the aircraft with steady hands, always mindful of their boundaries and the plane's operating limits. Their thoughtful approach makes them a joy to train and a credit to the skies.
                </p>

                <!-- Pricing Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white/50 rounded-lg overflow-hidden">
                        <thead class="bg-[#204fb4] text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Task or Item</th>
                                <th class="px-4 py-3 text-center">Time</th>
                                <th class="px-4 py-3 text-center">Cost</th>
                                <th class="px-4 py-3 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Dual Time With Instructor</td>
                                <td class="px-4 py-3 text-center">35</td>
                                <td class="px-4 py-3 text-center">CAD299</td>
                                <td class="px-4 py-3 text-right">CAD10,465.00</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">Flight Brief/ Debrief and Ground School Lesson Review with CFI</td>
                                <td class="px-4 py-3 text-center">35</td>
                                <td class="px-4 py-3 text-center">CAD99.7</td>
                                <td class="px-4 py-3 text-right">CAD3,488.33</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Solo Flight Time</td>
                                <td class="px-4 py-3 text-center">5</td>
                                <td class="px-4 py-3 text-center" colspan="2">Use Own Aircraft</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">Solo Flight Ground Instruction</td>
                                <td class="px-4 py-3 text-center">3</td>
                                <td class="px-4 py-3 text-center">CAD99.7</td>
                                <td class="px-4 py-3 text-right">CAD299.00</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Ground School for the Aeronautical Flight, FAA Knowledge test and Checkride</td>
                                <td class="px-4 py-3 text-center">40</td>
                                <td class="px-4 py-3 text-center" colspan="2">self study</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">FAA Knowledge Test</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD50.00</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Checkride</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD350.00</td>
                            </tr>
                            <tr class="bg-purple-100/50 font-bold">
                                <td class="px-4 py-3">Total</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD14,652.33</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-sm text-gray-600 mt-4 italic">
                    Note: If you show up with your own Trike, reduce the cost of CFI from CAD 299 to CAD 199
                </p>
            </div>
        </div>

        <!-- Long Learners (LL) Section -->
        <div class="max-w-4xl mx-auto mb-16">
            <h3 class="text-2xl font-bold text-[#204fb4] mb-6 text-center">LL: Long Learners – Dedication That Reaches New Heights!</h3>
            <div class="bg-white/30 rounded-xl p-8">
                <p class="text-lg text-gray-700 leading-relaxed mb-6">
                    Long Learners (LL) are the unsung heroes of hard work, pouring their hearts into demanding careers to fund their passions. These are the folks who've saved every penny to turn dreams into reality—whether it's a dream home, a sleek yacht, or their very own aircraft. Every step they take is deliberate, every decision carefully weighed, reflecting their thoughtful and analytical nature.
                </p>
                
                <p class="text-lg text-gray-700 leading-relaxed mb-8">
                    While caution is a strength, we encourage LLs to trust in their growing skills and believe in themselves. You've got this—and we've got your back! Our training is tailored to ensure you're fully prepared, step by step, until you're ready to take the controls for that exhilarating solo flight. With your dedication and our guidance, you'll soar confidently toward your aviation dreams.
                </p>

                <!-- Pricing Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse bg-white/50 rounded-lg overflow-hidden">
                        <thead class="bg-[#204fb4] text-white">
                            <tr>
                                <th class="px-4 py-3 text-left">Task or Item</th>
                                <th class="px-4 py-3 text-center">Time</th>
                                <th class="px-4 py-3 text-center">Cost</th>
                                <th class="px-4 py-3 text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Dual Time With Instructor</td>
                                <td class="px-4 py-3 text-center">55</td>
                                <td class="px-4 py-3 text-center">CAD299</td>
                                <td class="px-4 py-3 text-right">CAD16,445.00</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">Flight Brief/ Debrief and Ground School Lesson Review with CFI</td>
                                <td class="px-4 py-3 text-center">35</td>
                                <td class="px-4 py-3 text-center">CAD99.7</td>
                                <td class="px-4 py-3 text-right">CAD3,488.33</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Solo Flight Time</td>
                                <td class="px-4 py-3 text-center">5</td>
                                <td class="px-4 py-3 text-center" colspan="2">Use Own Aircraft</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">Solo Flight Ground Instruction</td>
                                <td class="px-4 py-3 text-center">4</td>
                                <td class="px-4 py-3 text-center">CAD99.7</td>
                                <td class="px-4 py-3 text-right">CAD398.67</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Ground School for the Aeronautical Flight, FAA Knowledge test and Checkride</td>
                                <td class="px-4 py-3 text-center">40</td>
                                <td class="px-4 py-3 text-center" colspan="2">self study</td>
                            </tr>
                            <tr class="border-b border-purple-100 bg-purple-50/30">
                                <td class="px-4 py-3">FAA Knowledge Test</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD50.00</td>
                            </tr>
                            <tr class="border-b border-purple-100">
                                <td class="px-4 py-3">Checkride</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD350.00</td>
                            </tr>
                            <tr class="bg-purple-100/50 font-bold">
                                <td class="px-4 py-3">Total</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-center">-</td>
                                <td class="px-4 py-3 text-right">CAD20,732.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <p class="text-sm text-gray-600 mt-4 italic">
                    Note: If you show up with your own Trike, reduce the cost of CFI from CAD 299 to CAD 199
                </p>
            </div>
        </div>
    </div>
</div>


<style>
/* Add smooth hover transitions */
.hover\:scale-105 {
    transition: transform 0.3s ease-in-out;
}

/* Add shadow transitions */
.shadow-lg {
    transition: box-shadow 0.3s ease-in-out;
}

/* Add gradient animation */
@keyframes gradientFlow {
    0% {
        background-position: 0% 50%;
    }
    50% {
        background-position: 100% 50%;
    }
    100% {
        background-position: 0% 50%;
    }
}

.bg-gradient-animate {
    background-size: 200% 200%;
    animation: gradientFlow 15s ease infinite;
}

/* Add text shadow for better visibility */
.text-shadow-lg {
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* Add glass morphism effect */
.backdrop-blur-sm {
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
}
#comprehensive-programs {
    scroll-margin-top: 4rem;
}
</style>
@endsection
