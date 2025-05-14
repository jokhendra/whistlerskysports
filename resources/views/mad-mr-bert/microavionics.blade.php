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
                <h1 class="text-4xl md:text-5xl font-bold mb-6 tracking-tight">MicroAvionics</h1>
                <p class="text-xl md:text-2xl text-[rgb(255,220,220)] mb-8">Intercom-radio systems, headsets, helmets, antennas, strobes</p>
                <img src="https://images.unsplash.com/photo-1533931604491-37d6291dc848?ixlib=rb-1.2.1&auto=format&fit=crop&w=400&h=100&q=80" alt="Air Trikes" class="mx-auto h-16 border border-white p-1 bg-white rounded shadow-lg">
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
    
    <!-- Main Content -->
    <div class="bg-white py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto">
        <!-- Title -->
                <h2 class="text-2xl font-bold mb-6 text-center text-gray-900">MicroAvionics: intercom-radio systems, headsets, helmets, antennas, strobes</h2>
        
        <!-- Introduction -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold mb-4 border-b border-gray-300 pb-2 text-[rgb(241,97,98)]">Introduction</h3>
                    <p class="mb-4 text-gray-700">MicroAvionics is a division of Terratrip [UK] Ltd, which was established in 1977, and has supplied Rally Computers and Intercoms to rally teams worldwide. The company has based its success on providing superb, reliable products together with first class after sales service.</p>
                
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-[rgb(241,97,98)] mb-6">
                        <h4 class="font-bold text-gray-900 mb-3">4 main reasons to choose MAD Mr Bert's MicroAvionics:</h4>
                        <ol class="list-decimal pl-8 mb-0 space-y-3 text-gray-700">
                            <li>MicroAvionics headsets, helmets and electronics are manufactured in England, using the latest electronic technology to produce the most advanced aircraft intercom equipment available. UL line is intended for Ultra/Microlights and optimized for open noisy aircraft cockpits. Tested and certified to European Airborne sports standard EN966 and carries the CE marking. The highest quality of materials, craftsmanship and sound.</li>
                            <li>The system is modular in design and can be configured to meet any specific requirement by selecting the appropriate component parts. The line of product is larger than the lines of other manufacturers, easier to optimize the best combination for any type of aircraft. MicroAvionics components are compatible with other brands, for example Lynx Avionics, Flycom, MT Autogyro. There are connectors and adapters for all modern radios, intercoms, cellphones etc.</li>
                            <li>MicroAvionics components are better priced than the similar components of other brands.</li>
                            <li>The company provides very good client support. The orders are sent fast, the questions are answered the same day. The specialists are ready to help with custom made cables, connectors and parts for the best fit to your aircraft and components you already have.</li>
                        </ol>
        </div>
        
                    <p class="mb-6 text-gray-700">The Microavionics UL system consists of headsets which contain the intercom circuitry and their own rechargeable batteries. Two headsets can be coupled together with a simple connector for excellent intercom function. The headsets can be used with radio-interface units to allow for radio (and other audio equipment) as well as intercom communication. There are 2 basic types of headsets - Passive Noise Reduction and Active Noise Reduction + VOX microphone. There are also 2 types of helmets. One is designed to be worn over a headsets and another one integrated with headset (Flycom type), both with visors. Radio interface can be powered by headset batteries or connected to 12V aircraft power supply. It allows to install 1-2 radio transmitters, cellphone, MP3 player, audio recorder etc. All kind of adapters.</p>
        
        <!-- Product Images Row 2 -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-white p-3 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/1comps.JPG" alt="Complete System" class="w-full h-auto">
            </div>
                        <div class="bg-white p-3 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/1ints.JPG" alt="Complete System" class="w-full h-auto">
            </div>
        </div>
        
                    <p class="mb-4 text-gray-700">These are the universal basic systems we install at our trikes and recommend for open cockpit aircraft - "warm" (integral helmets) and "cold" (helmets + headsets). Radio interface, PTT, connector, charger. Cellphone with a bright screen (can be used as GPS + for calls, music listening, even as artificial horizon and cellphone web approximate navigation) + its lead. Handheld Rexon RHP-530 or Icom A6 A14 radio.</p>

        <!-- Video demonstration section -->
                    <div class="mb-8 mx-auto max-w-3xl">
                        <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden border-4 border-white shadow-xl">
                            <iframe src="https://www.youtube.com/embed/hcqT-br7_4Y" title="WAG 2009 Microlight Pylon Racing - Chris Sayler" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="w-full h-full"></iframe>
                        </div>
                        <p class="mt-4 text-gray-700 text-center italic">A good proof of MicroAvionics highest quality can be this video. Pilots of British Microlight team, World and World Air Games (Aviation «Olympic Games») champions use MicroAvionics equipment flying their fastest P&M QuickR trikes.</p>
        </div>

                    <p class="mb-8 text-gray-700">More detailed information about main products divided by categories below:</p>
                </div>

        <!-- Aviation headsets section -->
                <div class="mb-12 bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-xl font-bold mb-6 border-b border-gray-300 pb-2 text-[rgb(241,97,98)] flex items-center">
                        <span>Aviation Headsets</span>
                        <span class="flex-grow border-b border-dashed border-gray-300 ml-4"></span>
                    </h3>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM001A_Large.jpg" alt="UL-100 Headset" class="w-full h-32 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM001BLUE_Large.jpg" alt="Standard Headset" class="w-full h-32 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MP001_Large.jpg" alt="UL-200 ANR Headset" class="w-full h-32 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MP001A_Large.jpg" alt="GA-100 Headset" class="w-full h-32 object-contain">
                </div>
            </div>

                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded border-l-4 border-[rgb(241,97,98)]">
                            <h4 class="font-bold text-gray-900 mb-2">UL-100</h4>
                            <p class="text-gray-700">Has self contained electronics with onboard NIMH batteries giving over 100 hours between recharge (no re-charge is needed if using a powered radio interface MM005). The headset uses a military specification noise canceling electret microphone designed for high noise environments coupled with a speaker that gives excellent sound qualities. The ear defender used is a twin skinned earcup, very similar to double glazed windows. Hence the earcup cuts out more noise than most other single skinned defenders on the market. Fitted with the latest liquid gel ear seals which reduce the pressure point effect from extended use also for users wearing glasses. The headset comes with individual volume dial mounted on the left earcup, large wind muff as standard (optional small wind muff to order) and heavy duty curly cable with 7 pin locking bayonet socket.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded border-l-4 border-[rgb(241,97,98)]">
                            <h4 class="font-bold text-gray-900 mb-2">UL-200 ANR & VOX</h4>
                            <p class="text-gray-700">Headset for ULM. This headset has been specifically designed to work in open and enclosed cockpits with specific attention to noise reduction and clear communication. The headset has the same features as UL-100 + it is fitted with ANR (active noise reduction) and VOX. ANR listens to the noise penetrating the ear cup and cancels this noise out using phase reversal technology. The result is an extremely quiet ear defender, even under the harshest environment. The ANR technology reduces this noise by 6dB, which is twice as quiet compared to non-ANR.</p>
                            <p class="text-gray-700 mt-2">The UL-200 also has VOX. VOX is a system where the microphone is switched off when you are not speaking. This in turn switches off the speakers in the ear cups to give an exceptionally quiet headset. The VOX level is user adjusted by a small control on the headset. The UL-200 is a first of its kind for microlight aircraft. The result from VOX & ANR means you have a very quiet headset, the quietest one I have ever used.</p>
                            <p class="text-gray-700 mt-2">UL headsets can be used with helmets for open cockpit and without helmets for enclosed cockpit. UL-100 & 200 are compatible with each other as well as with Lynx Avionics Micro system.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">UL-100(200)BLACK or blue</h4>
                            <p class="text-gray-700">This headset uses a different ear defender, giving a sleek look.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">UL-100(200)H</h4>
                            <p class="text-gray-700">For helmet fixing (Icaro type helmets and similar). No headband. Also can be BLACK version.</p>
                        </div>
                    </div>

            <div class="flex justify-center my-6">
                        <div class="bg-white p-3 border border-gray-300 rounded shadow-md">
                    <img src="https://airtrikes.net/ma/1headsets1.JPG" alt="Intercom System" class="mx-auto max-w-full h-auto">
                </div>
            </div>

                    <p class="mb-4 text-gray-700">A pair of headsets can be plugged into a linking adapter (MM004), giving a simple intercom between pilot and passenger. Using this system you can move from aircraft to aircraft without any fixed equipment. If you require connection to a radio, cell phone, second radio or music then you would connect each headset to a radio interface (MM005). Of course a headset can be used on its own or as a pair.</p>

                    <div class="space-y-4 mt-6">
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">GA-100</h4>
                            <p class="text-gray-700">GA headset with twin jack plugs. The headset has excellent ambient noisy cancellation, and is ideally suited to very noisy aircraft. The same basic features as UL-100: military specification noise cancelling electret microphone, twin skinned ear defenders, gel ear seals, heavy duty curly lead, twin wind muff etc.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">GA-200 ANR</h4>
                            <p class="text-gray-700">The headset has self contained electronics without the need for external control boxes. The headset incorporates active noise reduction and VOX. Designed to last for 50 hours+ between re-charge. Charger included. There is also BLACK version of this headset with a smaller ear defender.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">PM-100</h4>
                            <p class="text-gray-700">Stereo Paramotor (Solo) headset with side tone. Fully specified stereo paramotor headset. Designed to be worn under a MicroAvionics CE marked safety helmet. No clips or clamps to attach as it has all these features: User can configure to work with any make of radio, large diameter ear foam cushions for extra comfort, ambient sound system with adjustable volume. Perfect for paramotor intercom. The headset has 'Side Tone'. Side tone enables the user to hear their own voice whilst transmitting, this eliminates the need to shout and transmits a clear audio transmission. Two headsets can be linked together for tandem use, using the optional tandem person lead. Headset can be ordered with helmet mount brackets for an Icaro style helmet, or the standard headset with the headband mount for wearing underneath a MicroAvionics helmet.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">Gyro</h4>
                            <p class="text-gray-700">Headset for MT Autogyro intercom. Headset can be ordered with either helmet mount brackets for an Icaro style helmet (MT use Icaro style helmet), or the standard headset comes with the headband mount for wearing underneath a MicroAvionics helmet.</p>
                        </div>
                    </div>
        </div>
        
        <!-- Integral Helmet+Headset System -->
        <div class="product-section">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-400 pb-1">Integral Helmet+Headset System............................................</h2>
            
            <div class="product-grid">
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM001BCD_Large3.jpg" alt="Integral Helmet 1" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM001BCD_Large5.jpg" alt="Integral Helmet 2" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM001BCD_Large1.jpg" alt="Integral Helmet 3" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM001BCD_Large6.jpg" alt="Integral Helmet 4" class="product-img">
                </div>
            </div>
            
                    <div class="space-y-4">
                        <p class="text-gray-700">Integral helmet (Flycom type). Light weight 870gram composite GRP shell with EPS trauma liner. Extra comfort and wind protection is achieved using the rear and side neck padding. Quick release two point chin strap. Tested and certified to European Airborne sports standard EN966, CE marked. BHV Jet Flip visor with Visor lock. UV protected and impact resistant, have an anti-scratch coating and have been tested to British standards. ABS molded AirDam chin guard with 4mm nylon backed neoprene installed. Microavionics Fleece neck warmer, different thickness foam pads and helmet bag are included.</p>
            
                        <p class="text-gray-700">The helmet can be ordered with installed UL-100, UL-200 ANR+VOX, GA-100, PM-100, FlyCom and MT Gyro intercom compatible headsets. Volume dial on rear left of helmet. VOX dial on rear right of helmet (for UL-200 only). White and black color. Helmet sizing is measured around the head just above the eyebrow sizes are S:55-56cm, M:57-58cm, L:59-60cm & XL:61-62 cm.</p>
                    </div>
        </div>
        
        <!-- Radio Interface -->
        <div class="product-section">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-400 pb-1">Radio Interface</h2>
            
            <p class="mb-4">V3 model with LEDs. Not just a simple radio interface. The latest electronic technology were used to produce an efficient powered radio interface with all the features a pilot would require. The user can change various selectable features which reconfigure radio type (i.e. from type 'A' [Icom A20] to Type 'BB' [Icom A6]) etc, control intercom volume levels, mute audio levels, etc. The voice reproduction through the intercom unit is very bright and clear, optimised for noisy environments. Connection to the mobile telephone is equally as clear and the Audio volume levels can be configured dependant upon what telephone or second radio you are connecting. There is a tone bleeper when you first press the PTT switch to indicate the PTT is activated. Compatible with Lynx Micro System headsets.</p>
            
            <p class="mb-4">Fully specified with five LED status monitors showing power, TX, RX and headset batteries charged. Connect an airband radio, and for chatting to your flying group, a second radio can be connected at the same time. Connection for mobile telephone is a standard feature. Stereo music input (twin audio-in for Hi or Low audio level) and separate stereo audio output. Twin PTT inputs, when P1 transmits the mic on P2 will mute and vice versa. User can select either 10v (Icom A6 etc) or 12 volt (Icom A3 etc) output to power the radio. User adjustable max intercom volume level and adjustable max mic TX level. Music, second radio, mobile telephone will mute automatically once the master radio receives an incoming signal. Auxiliary Control circuit for two coloured LED on the dash board showing RX and TX (optional accessory). The interface comes pre-configured and ready to plug and go. Master intercom volume output to set max volume level and individual headset volume control on each headset to fine tune personal preferences. Can be connected to 12V aircraft power supply to charge the handheld radio and headset batteries. The interface incorporates a battery monitor that turns the battery charging circuit off when headsets are fully charged, this extends the life of the headset batteries. No need to connect power as the interface will use the headset power with very low power consumption, typically only 1 mA.</p>
            
            <p class="mb-4">Requires: Ignition Power supply lead MM007. Stereo Audio input/output lead MM010.<br>
            Additional options: PTT buttons and Cellphone lead (3.5 jack for iPhone/Samsung/Galaxy, Note etc.).</p>
            
            <p class="mb-4"><strong>NEW PRODUCT: MM005-BT</strong> with Bluetooth phone/music connection. More expensive than MM005 but no audio-telephone cables.</p>
        </div>
        
        <!-- ULM Helmet -->
        <div class="product-section">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-400 pb-1">ULM helmet.............................................</h2>
            
            <div class="product-grid">
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM020A_Large.jpg" alt="ULM Helmet 1" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM020A-N_Large.jpg" alt="ULM Helmet 2" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM020B-MM020_Large.jpg" alt="ULM Helmet 3" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/MM021_Large.jpg" alt="ULM Helmet 4" class="product-img">
                </div>
            </div>
            
                    <div class="space-y-4">
                        <p class="text-gray-700">Tested and certified to European Airborne sports standard EN966 and carries the CE marking. A composite helmet designed to be worn over a standard microlight/ ULM headset. The outer shell is made from composites and has an EPS shock absorbent liner with a webbing strap and quick release buckle. The helmet is light weight, at only 700grams. BHV Jet Flip visor with Visor lock, clear or half tint visor is available. Can be fitted with ABS or Neoprene Air Dam wind deflector to the bottom of the visor. Our visors are UV protected, have an anti scratch coating and have been tested to British standards.</p>
            
                        <p class="text-gray-700">Helmet sizing is measured around the head just above the eyebrow sizes are S:55-56cm, M:57-58cm, L:59-60cm & XL:61-62 cm. White color only.</p>
            
                        <p class="text-gray-700">Comes with a blue screen printed helmet bag & fleece neck roll.</p>
                    </div>
        </div>
        
        <!-- Paramotor helmets -->
        <div class="product-section">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-400 pb-1">Paramotor helmets.............................................</h2>
            
            <div class="product-grid">
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/Icaro_Solar_carbon.jpg" alt="Paramotor Helmet 1" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/icaro_solar_x.jpg" alt="Paramotor Helmet 2" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/icaro_scarab_carbon.jpg" alt="Paramotor Helmet 3" class="product-img">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/Plusmax.jpg" alt="Paramotor Helmet 4" class="product-img">
                </div>
            </div>
            
            <p class="mb-4">3 types of paramotor helmets are available. Icaro Solar, Icaro Scarab and Plusmax. Variety of colors for Icaro Solar helmets (some colors extra cost). Can be supplied with Long and Short visors, clear, shaded or mirror color. Helmet sizing is measured around the head just above the eyebrow sizes are S:55-56cm, M:57-58cm, L:59-60cm & XL:61-62 cm. XXL 64 cm.</p>
            
            <p class="mb-4">Can be supplied with Peltor Ear Defenders or any available headset (PM, UL, GA, MT) type.</p>
        </div>
        
        <!-- Combos section -->
        <div class="product-section">
            <h2 class="text-lg font-bold mb-4 border-b border-gray-400 pb-1">Combos.............................................</h2>
            
            <p class="mb-4">If you are not sure what you need, this section will help. The standard recommended packages for 2-place aircraft. (A) means ANR-VOX headsets.</p>
            
            <div class="flex flex-nowrap flex-row justify-center gap-6 mb-6">
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/1combo.JPG" alt="Mobile Intercom" class="object-contain w-auto h-auto">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/1combo_R.JPG" alt="Intercom-Radio System" class="object-contain w-auto h-auto">
                </div>
            </div>
            
            <p class="mb-4"><strong>Combo-1(A)</strong> Mobile intercom for closed cockpit. A pair of UL headsets can be plugged into a linking adapter (MM004), giving a simple intercom between pilot and passenger. Using this system you can move from aircraft to aircraft without any fixed equipment. + MM002 charger for headset batteries. As this intercom is not connected to aircraft electrical system, there is no electrical noise from it.</p>
            
            <p class="mb-4"><strong>Combo-1R(A)</strong> Intercom-radio system for closed cockpit 2 UL headsets + radio interface MM005 + PTT MM009(6). MM005 will charge headsets and radio if connected to 12V aircraft power supply.</p>
            
            <div class="flex flex-nowrap flex-row justify-center gap-6 mb-6">
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/3combo.JPG" alt="Combo with helmets" class="object-contain w-auto h-auto">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/3combo_R.JPG" alt="Combo with radio" class="object-contain w-auto h-auto">
                </div>
            </div>
            
            <p class="mb-4"><strong>Combo-3(A)</strong> Mobile intercom with helmets&visors. 2 UL headsets + 2 MM020B helmets + MM004 + charger MM002.</p>
            
            <p class="mb-4"><strong>Combo-3R(A)</strong> Intercom-radio system + helmets&visors. 2 UL headsets + 2 MM020B helmets + 7005 + PTT MM009 (MM006).</p>
            
            <p class="mb-4">Can be recommended for open cockpit aircraft (PPC, trike, gyro, 3-axis).</p>
            
            <div class="flex flex-nowrap flex-row justify-center gap-6 mb-6">
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/4combo.JPG" alt="Combo with integral helmets" class="object-contain w-auto h-auto">
                </div>
                <div class="image-box">
                    <img src="https://airtrikes.net/ma/4combo_R.JPG" alt="Combo with integral helmets and radio" class="object-contain w-auto h-auto">
                </div>
            </div>
            
            <p class="mb-4"><strong>Combo-4(A)</strong> Mobile intercom with integral (Flycom type) helmets for open cockpit aircraft. A pair of helmets can be plugged into a linking adapter (MM004), giving a simple intercom between pilot and passenger. Using this system you can move from aircraft to aircraft without any fixed equipment. + MM002 charger for headset batteries. As this intercom is not connected to aircraft electrical system, there is no electrical noise from it.</p>
            
            <p class="mb-4"><strong>Combo-4R(A)</strong> Intercom-radio system with integral (Flycom type) helmets for open cockpit aircraft. 2 integral helmets + radio interface MM005 + PTT MM009 (or MM006).</p>
            
            <p class="mb-4">Can be recommended for open cockpit aircraft (PPC, trike, gyro, 3-axis). Additional option - Icom A6/A24 radio.</p>
        </div>
        
        <!-- Strobes section -->
                <div class="mb-12 bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-xl font-bold mb-6 border-b border-gray-300 pb-2 text-[rgb(241,97,98)] flex items-center">
                        <span>Strobes</span>
                        <span class="flex-grow border-b border-dashed border-gray-300 ml-4"></span>
                    </h3>
                    
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM030_Large.jpg" alt="MM020 Strobe" class="w-full h-32 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM034_Large.jpg" alt="Integrated Strobe" class="w-full h-32 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM035_Large.jpg" alt="Small Strobe" class="w-full h-32 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM038_Large.jpg" alt="Strobe Controller" class="w-full h-32 object-contain">
                </div>
            </div>
            
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded border-l-4 border-[rgb(241,97,98)]">
                            <h4 class="font-bold text-gray-900 mb-2">MM020 Self Contained strobe</h4>
                            <p class="text-gray-700">New version. Redesigned to be the brightest stand alone ULM strobe on the market. Can be connected to a standard 12 volt battery or aircraft supply. Ideal for paramotor, microlight and small aircraft. 270gramms weight. Flashes rate 42 per minute. Visible over 2 miles away. Universal bracket and bolt fixing kit included.</p>
                        </div>
                        
                        <p class="text-gray-700">Single, Double or Triple Head High Power Strobe system with 3 head driver box (specify Teardrop or Cylinder lens or mix)</p>
                    </div>
        </div>
        
        <!-- Antennas section -->
                <div class="mb-12 bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-xl font-bold mb-6 border-b border-gray-300 pb-2 text-[rgb(241,97,98)] flex items-center">
                        <span>Antennas</span>
                        <span class="flex-grow border-b border-dashed border-gray-300 ml-4"></span>
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM050.jpg" alt="Metal Whip Antenna" class="w-full h-40 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM051.jpg" alt="Flexible Antenna" class="w-full h-40 object-contain">
                </div>
                        <div class="bg-white p-2 border border-gray-300 rounded shadow-sm hover:shadow-md transition-shadow">
                            <img src="https://airtrikes.net/ma/MM052.jpg" alt="King Post Antenna" class="w-full h-40 object-contain">
                </div>
            </div>
            
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">MM050 Metal Whip antenna for 3 Axis Aircraft & Gyro</h4>
                            <p class="text-gray-700">Ideally fitted through a metal fuselage. It is possible to also fit through a fibre glass or plastic fuselage body. Can also be fitted onto a metal bracket and bolted to a metal structure. Simple ground plane kit included.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">MM050 Flexible Antenna for Delta / flex wing microlights & Gyro</h4>
                            <p class="text-gray-700">This antenna will fit through a fibre glass or plastic fuselage/ body, usually the nose of a trike. Simple ground plane is included.</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded">
                            <h4 class="font-bold text-gray-900 mb-2">MM052 King Post Antenna</h4>
                            <p class="text-gray-700">This Di-pole antenna should be fitted to the King post of a Delta / flex wing microlight trike. It comes with a wiring loom and enough cable to reach the aircraft instrument panel. Connectors are fitted to suit the loom when designing the wing.</p>
                        </div>
                    </div>
        </div>
        
        <!-- Additional Info -->
                <div class="mb-12 bg-white p-6 rounded-lg shadow-md border border-gray-200">
                    <h3 class="text-xl font-bold mb-6 border-b border-gray-300 pb-2 text-[rgb(241,97,98)] flex items-center">
                        <span>Additional Information</span>
                        <span class="flex-grow border-b border-dashed border-gray-300 ml-4"></span>
                    </h3>
                    
                    <div class="space-y-4">
                        <p class="text-gray-700">There are other products - cables, adapters, connectors etc. Full MicroAvionics Pricelist <a href="/mad-mr-bert/prices" class="text-[rgb(241,97,98)] hover:underline">here</a>. Rexon radio prices are also there.</p>
                        
                        <p class="text-gray-700">MicroAvionics UK Website <a href="http://www.microavionics.co.uk" target="_blank" class="text-[rgb(241,97,98)] hover:underline">here</a>.</p>
                        
                        <p class="text-gray-700">More info about Rexon radios and comm. systems <a href="/mad-mr-bert/rexon-radios" class="text-[rgb(241,97,98)] hover:underline">HERE</a>.</p>
                        
                        <div class="bg-gray-100 p-5 rounded-lg border-l-4 border-[rgb(241,97,98)] mt-6">
                            <p class="text-gray-800 font-medium">If you want to place an order or ask questions - <a href="/mad-mr-bert/contact" class="text-[rgb(241,97,98)] font-bold hover:underline">contact us</a>.</p>
                        </div>
                    </div>
        </div>
        
        <!-- Bottom Navigation -->
                <div class="text-center mb-4">
                    <div class="h-2 bg-gradient-to-r from-[rgb(241,97,98,0.1)] via-[rgb(241,97,98)] to-[rgb(241,97,98,0.1)] rounded mb-6"></div>
        
                    <div class="flex justify-center py-4 space-x-6 mb-6">
                        <a href="/contact" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] font-medium transition-colors duration-300">Contact Us</a>
                        <a href="/mad-mr-bert" class="text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] font-medium transition-colors duration-300">MAD Mr Bert's</a>
        </div>
        
        <!-- Log Image -->
        <div class="text-center mb-4">
            <img src="https://images.unsplash.com/photo-1503431760783-91f2569f6802?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&h=30&q=80" alt="StatLog" class="mx-auto">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 