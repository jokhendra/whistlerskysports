@extends('layouts.app')

@push('styles')
  <!-- Add intl-tel-input CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css">
  
  <style>
    .iti {
      width: 100%;
    }

    .iti__country-list {
      max-height: 300px;
      width: 200px;
      overflow-y: scroll;
      overflow-x: hidden;
    }

    .iti__selected-flag {
      padding: 0 8px 0 8px;
      background-color: #F3F4F6 !important;
      width: auto;
    }

    .iti--separate-dial-code .iti__selected-flag {
      background-color: #F3F4F6;
      border-radius: 0.5rem 0 0 0.5rem;
      border: 1px solid #D1D5DB;
      border-right: none;
      min-width: 95px;
    }

    .iti--separate-dial-code input {
      border-radius: 0 0.5rem 0.5rem 0;
      padding-left: 100px !important;
      padding-right: 15px;
      width: 100%;
    }

    .iti--separate-dial-code .iti__selected-dial-code {
      padding-left: 10px;
    }

    .iti__country {
      padding: 8px 10px;
      display: flex;
      align-items: center;
    }

    .iti__country-name {
      margin-left: 8px;
      font-size: 14px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }

    .iti__dial-code {
      color: #6B7280;
      font-size: 13px;
    }

    #phone, #billing_phone {
      height: 3rem;
      border-color: #D1D5DB;
      transition: all 0.2s;
      width: 100%;
      text-indent: 0;
    }

    #phone:focus, #billing_phone:focus {
      border-color: #3B82F6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
      outline: none;
    }

    #phone.error, #billing_phone.error {
      border-color: #EF4444;
    }
  </style>
@endpush

@section('content')
<!-- Hero Section -->
<div class="relative bg-gradient-to-b from-[rgb(241,97,98)] to-[rgb(200,60,60)] text-white py-8 sm:py-12 md:py-16 lg:mt-24 md:mt-24 mt-16">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Checkout</h1>
            <p class="text-xl text-[rgb(255,200,200)]">Complete your purchase</p>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-6xl mx-auto">
            
            @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                {{ session('error') }}
            </div>
            @endif
        
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Checkout Form -->
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden p-6 mb-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Shipping Information</h2>
                        
                        <form action="{{ route('mad-mr-bert.process-order') }}" method="POST">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                                    <input type="text" id="name" name="name" placeholder="John Smith" value="{{ old('name') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                    @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                    <input type="email" id="email" name="email" placeholder="john.smith@example.com" value="{{ old('email') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                    @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                <input type="tel" id="phone" placeholder="Enter your phone number" name="phone" value="{{ old('phone') }}" class="w-full ps-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent transition duration-200" required>
                                @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-6">
                                <label for="address" class="block text-gray-700 font-medium mb-2">Shipping Address</label>
                                <input type="text" id="address" name="address" value="{{ old('address') }}" placeholder="Address Line 1" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                @error('address')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="country" class="block text-gray-700 font-medium mb-2">Country</label>
                                    <select id="country" name="country" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                        <option value="">Select Country</option>
                                    </select>
                                    @error('country')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="state" class="block text-gray-700 font-medium mb-2">State/Province</label>
                                    <select id="state" name="state" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent" disabled>
                                        <option value="">Select State/Province</option>
                                    </select>
                                    @error('state')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="city" class="block text-gray-700 font-medium mb-2">City</label>
                                    <select id="city" name="city" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent" disabled>
                                        <option value="">Select City</option>
                                    </select>
                                    @error('city')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div>
                                    <label for="postal_code" class="block text-gray-700 font-medium mb-2">Postal Code</label>
                                    <input type="text" id="postal_code" name="postal_code" value="{{ old('postal_code') }}" required class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                    @error('postal_code')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 mt-10">Billing Information</h2>
                            
                            <div class="mb-6">
                                <div class="flex items-center mb-4">
                                    <input type="checkbox" id="same_as_shipping" name="same_as_shipping" value="1" checked class="h-4 w-4 text-[rgb(241,97,98)] focus:ring-[rgb(241,97,98)]">
                                    <label for="same_as_shipping" class="ml-2 block text-gray-700">Use shipping address as billing address</label>
                                </div>
                            </div>
                            
                            <div id="billing_address_form" class="hidden">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="billing_name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                                        <input type="text" id="billing_name" name="billing_name" value="{{ old('billing_name') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                        @error('billing_name')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label for="billing_email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                        <input type="email" id="billing_email" name="billing_email" value="{{ old('billing_email') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                        @error('billing_email')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-6">
                                    <label for="billing_phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                    <input type="tel" id="billing_phone" placeholder="Enter your phone number" name="billing_phone" value="{{ old('billing_phone') }}" class="w-full ps-10 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent transition duration-200">
                                    @error('billing_phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="mb-6">
                                    <label for="billing_address" class="block text-gray-700 font-medium mb-2">Billing Address</label>
                                    <input type="text" id="billing_address" name="billing_address" value="{{ old('billing_address') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                    @error('billing_address')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                  
                                    <div>
                                        <label for="billing_country" class="block text-gray-700 font-medium mb-2">Country</label>
                                        <select id="billing_country" name="billing_country" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                            <option value="">Select Country</option>
                                        </select>
                                        @error('billing_country')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="billing_state" class="block text-gray-700 font-medium mb-2">State/Province</label>
                                        <select id="billing_state" name="billing_state" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent" disabled>
                                            <option value="">Select State/Province</option>
                                        </select>
                                        @error('billing_state')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                    <div>
                                        <label for="billing_city" class="block text-gray-700 font-medium mb-2">City</label>
                                        <select id="billing_city" name="billing_city" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent" disabled>
                                            <option value="">Select City</option>
                                        </select>
                                        @error('billing_city')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    
                                    <div>
                                        <label for="billing_postal_code" class="block text-gray-700 font-medium mb-2">Postal Code</label>
                                        <input type="text" id="billing_postal_code" name="billing_postal_code" value="{{ old('billing_postal_code') }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[rgb(241,97,98)] focus:border-transparent">
                                        @error('billing_postal_code')
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                    
                            </div>
                            
                            <h2 class="text-2xl font-bold text-gray-900 mb-6 mt-10">Payment Method</h2>
                            
                            <div class="mb-8">
                                <div class="flex items-center mb-4">
                                    <input type="radio" id="paypal" name="payment_method" value="paypal" checked class="h-4 w-4 text-[rgb(241,97,98)] focus:ring-[rgb(241,97,98)]">
                                    <label for="paypal" class="ml-2 block text-gray-700">PayPal</label>
                                    <div class="ml-2">
                                        <img src="{{ asset('images/paypal-logo.png') }}" alt="PayPal" class="h-6" onerror="this.src='https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg'; this.onerror=null;">
                                    </div>
                                </div>
                                
                                @error('payment_method')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                                
                                <p class="text-sm text-gray-500 mt-2">You will be redirected to PayPal to complete your payment securely.</p>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <a href="{{ route('mad-mr-bert.cart') }}" class="inline-flex items-center text-[rgb(241,97,98)] hover:text-[rgb(200,60,60)] transition-colors duration-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    Back to Cart
                                </a>
                                
                                <button type="submit" class="py-3 px-6 bg-[rgb(241,97,98)] hover:bg-[rgb(200,60,60)] text-white font-semibold rounded-lg transition-colors duration-300">
                                    Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:w-1/3">
                    <div class="bg-gray-50 rounded-lg shadow-lg p-6 sticky top-24">
                        <h3 class="text-xl font-semibold text-gray-900 mb-6">Order Summary</h3>
                        
                        <div class="space-y-4 mb-6">
                            @foreach($cart->items as $item)
                            <div class="flex justify-between items-center pb-4 border-b">
                                <div class="flex items-center">
                                    <img src="{{ $item->product->image ?? 'https://picsum.photos/100/100?random=' . $item->product_id }}" alt="{{ $item->product->name ?? 'Product' }}" class="w-12 h-12 object-cover rounded-md mr-3">
                                    <div>
                                        <h4 class="font-medium">{{ $item->product->name ?? 'Product #' . $item->product_id }}</h4>
                                        <p class="text-gray-500 text-sm">Qty: {{ $item->quantity }}</p>
                                    </div>
                                </div>
                                <span class="font-semibold">CAD ${{ number_format($item->price * $item->quantity, 2) }}</span>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-semibold">CAD ${{ number_format($cart->total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-semibold">CAD $0.00</span>
                            </div>
                            <div class="border-t pt-3 mt-3">
                                <div class="flex justify-between">
                                    <span class="text-lg font-bold">Total</span>
                                    <span class="text-lg font-bold">CAD ${{ number_format($cart->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Billing Address Toggle Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sameAsShippingCheckbox = document.getElementById('same_as_shipping');
    const billingAddressForm = document.getElementById('billing_address_form');
    
    // Function to toggle billing address form visibility
    function toggleBillingForm() {
        if (sameAsShippingCheckbox.checked) {
            billingAddressForm.classList.add('hidden');
        } else {
            billingAddressForm.classList.remove('hidden');
        }
    }
    
    // Set initial state
    toggleBillingForm();
    
    // Add event listener for changes
    sameAsShippingCheckbox.addEventListener('change', toggleBillingForm);
});
</script>
@endsection

@push('scripts')
  <!-- Add intl-tel-input JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const phoneInput = document.querySelector("#phone");
      const iti = window.intlTelInput(phoneInput, {
        separateDialCode: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        initialCountry: "ca",
        onlyCountries: [], // This will show all countries
        localizedCountries: {}, // Use default country names
        formatOnDisplay: true,
        autoPlaceholder: "aggressive",
        customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
          return "e.g. " + selectedCountryPlaceholder;
        }
      });

      // Allow only numbers and prevent non-numeric input
      phoneInput.addEventListener('keypress', function(e) {
        const char = String.fromCharCode(e.which);
        if (!/[0-9]/.test(char)) {
          e.preventDefault();
        }
      });

      // Prevent paste of non-numeric characters
      phoneInput.addEventListener('paste', function(e) {
        const pastedText = (e.clipboardData || window.clipboardData).getData('text');
        if (!/^\d+$/.test(pastedText)) {
          e.preventDefault();
        }
      });

      // Clean any non-numeric characters on input
      phoneInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^\d]/g, '');
        if (iti.isValidNumber()) {
          this.classList.remove('error');
        }
      });

      // Validate on blur
      phoneInput.addEventListener('blur', function() {
        if (phoneInput.value.trim()) {
          if (!iti.isValidNumber()) {
            phoneInput.classList.add('error');
          } else {
            phoneInput.classList.remove('error');
          }
        }
      });

      // Form validation
      const form = document.querySelector('form');
      form.addEventListener('submit', function(e) {
        if (!iti.isValidNumber()) {
          e.preventDefault();
          phoneInput.classList.add('error');
          alert('Please enter a valid phone number');
          phoneInput.focus();
          return false;
        }
        phoneInput.value = iti.getNumber();
      });
      
      // Billing phone setup
      const billingPhoneInput = document.querySelector("#billing_phone");
      if (billingPhoneInput) {
        const billingIti = window.intlTelInput(billingPhoneInput, {
          separateDialCode: true,
          utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
          initialCountry: "ca",
          onlyCountries: [],
          localizedCountries: {},
          formatOnDisplay: true,
          autoPlaceholder: "aggressive",
        });
        
        // Apply same event listeners for billing phone
        billingPhoneInput.addEventListener('keypress', function(e) {
          const char = String.fromCharCode(e.which);
          if (!/[0-9]/.test(char)) {
            e.preventDefault();
          }
        });
        
        billingPhoneInput.addEventListener('paste', function(e) {
          const pastedText = (e.clipboardData || window.clipboardData).getData('text');
          if (!/^\d+$/.test(pastedText)) {
            e.preventDefault();
          }
        });
        
        billingPhoneInput.addEventListener('input', function() {
          this.value = this.value.replace(/[^\d]/g, '');
          if (billingIti.isValidNumber()) {
            this.classList.remove('error');
          }
        });
        
        billingPhoneInput.addEventListener('blur', function() {
          if (billingPhoneInput.value.trim()) {
            if (!billingIti.isValidNumber()) {
              billingPhoneInput.classList.add('error');
            } else {
              billingPhoneInput.classList.remove('error');
            }
          }
        });
        
        // Handle same as shipping checkbox
        const sameAsShippingCheckbox = document.getElementById('same_as_shipping');
        if (sameAsShippingCheckbox) {
          sameAsShippingCheckbox.addEventListener('change', function() {
            if (this.checked) {
              // When checked, no need to validate billing phone
              form.removeEventListener('submit', validateBillingPhone);
            } else {
              // Add validation when unchecked
              form.addEventListener('submit', validateBillingPhone);
            }
          });
          
          function validateBillingPhone(e) {
            if (billingPhoneInput.value.trim() && !billingIti.isValidNumber()) {
              e.preventDefault();
              billingPhoneInput.classList.add('error');
              alert('Please enter a valid billing phone number');
              billingPhoneInput.focus();
              return false;
            }
            billingPhoneInput.value = billingIti.getNumber();
          }
        }
      }
    });
  </script>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize same_as_shipping checkbox functionality
        const sameAsShippingCheckbox = document.getElementById('same_as_shipping');
        const billingAddressForm = document.getElementById('billing_address_form');
        
        sameAsShippingCheckbox.addEventListener('change', function() {
            if (this.checked) {
                billingAddressForm.classList.add('hidden');
            } else {
                billingAddressForm.classList.remove('hidden');
            }
        });
        
        // Initialize location dropdowns
        initLocationDropdowns();
        
        // Function to initialize location dropdowns
        function initLocationDropdowns() {
            // Shipping address dropdowns
            const countryDropdown = document.getElementById('country');
            const stateDropdown = document.getElementById('state');
            const cityDropdown = document.getElementById('city');
            
            // Billing address dropdowns
            const billingCountryDropdown = document.getElementById('billing_country');
            const billingStateDropdown = document.getElementById('billing_state');
            const billingCityDropdown = document.getElementById('billing_city');
            
            // Load countries for both shipping and billing
            fetchCountries(countryDropdown);
            fetchCountries(billingCountryDropdown);
            
            // Add event listeners for shipping address
            countryDropdown.addEventListener('change', function() {
                resetDropdown(stateDropdown, 'Select State/Province');
                resetDropdown(cityDropdown, 'Select City');
                
                if (this.value) {
                    stateDropdown.disabled = false;
                    fetchStates(this.value, stateDropdown);
                } else {
                    stateDropdown.disabled = true;
                    cityDropdown.disabled = true;
                }
                
                // If same as shipping is checked, copy values to billing
                if (sameAsShippingCheckbox.checked) {
                    billingCountryDropdown.value = this.value;
                    billingCountryDropdown.dispatchEvent(new Event('change'));
                }
            });
            
            stateDropdown.addEventListener('change', function() {
                resetDropdown(cityDropdown, 'Select City');
                
                if (this.value) {
                    cityDropdown.disabled = false;
                    fetchCities(countryDropdown.value, this.value, cityDropdown);
                } else {
                    cityDropdown.disabled = true;
                }
                
                // If same as shipping is checked, copy values to billing
                if (sameAsShippingCheckbox.checked) {
                    billingStateDropdown.value = this.value;
                    billingStateDropdown.dispatchEvent(new Event('change'));
                }
            });
            
            cityDropdown.addEventListener('change', function() {
                // If same as shipping is checked, copy values to billing
                if (sameAsShippingCheckbox.checked && this.value) {
                    billingCityDropdown.value = this.value;
                }
            });
            
            // Add event listeners for billing address
            billingCountryDropdown.addEventListener('change', function() {
                resetDropdown(billingStateDropdown, 'Select State/Province');
                resetDropdown(billingCityDropdown, 'Select City');
                
                if (this.value) {
                    billingStateDropdown.disabled = false;
                    fetchStates(this.value, billingStateDropdown);
                } else {
                    billingStateDropdown.disabled = true;
                    billingCityDropdown.disabled = true;
                }
            });
            
            billingStateDropdown.addEventListener('change', function() {
                resetDropdown(billingCityDropdown, 'Select City');
                
                if (this.value) {
                    billingCityDropdown.disabled = false;
                    fetchCities(billingCountryDropdown.value, this.value, billingCityDropdown);
                } else {
                    billingCityDropdown.disabled = true;
                }
            });
            
            // Add event listener to the same as shipping checkbox
            sameAsShippingCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    // Copy values from shipping to billing
                    billingCountryDropdown.value = countryDropdown.value;
                    billingCountryDropdown.dispatchEvent(new Event('change'));
                    
                    // Give time for states to load
                    setTimeout(() => {
                        billingStateDropdown.value = stateDropdown.value;
                        billingStateDropdown.dispatchEvent(new Event('change'));
                        
                        // Give time for cities to load
                        setTimeout(() => {
                            billingCityDropdown.value = cityDropdown.value;
                        }, 300);
                    }, 300);
                }
            });
        }
        
        // Function to fetch countries from API
        function fetchCountries(dropdownElement) {
            showLoading(dropdownElement);
            fetch("{{ route('api.location.countries') }}")
                .then(response => response.json())
                .then(data => {
                    populateDropdown(dropdownElement, data);
                    hideLoading(dropdownElement);
                    
                    // If there's old input, try to select it
                    @if(old('country'))
                    if (dropdownElement.id === 'country') {
                        dropdownElement.value = "{{ old('country') }}";
                        dropdownElement.dispatchEvent(new Event('change'));
                    }
                    @endif
                    
                    @if(old('billing_country'))
                    if (dropdownElement.id === 'billing_country') {
                        dropdownElement.value = "{{ old('billing_country') }}";
                        dropdownElement.dispatchEvent(new Event('change'));
                    }
                    @endif
                })
                .catch(error => {
                    console.error('Error fetching countries:', error);
                    hideLoading(dropdownElement);
                });
        }
        
        // Function to fetch states from API
        function fetchStates(country, dropdownElement) {
            showLoading(dropdownElement);
            fetch(`{{ route('api.location.states') }}?country=${country}`)
                .then(response => response.json())
                .then(data => {
                    populateDropdown(dropdownElement, data);
                    hideLoading(dropdownElement);
                    
                    // If there's old input, try to select it
                    @if(old('state'))
                    if (dropdownElement.id === 'state') {
                        dropdownElement.value = "{{ old('state') }}";
                        dropdownElement.dispatchEvent(new Event('change'));
                    }
                    @endif
                    
                    @if(old('billing_state'))
                    if (dropdownElement.id === 'billing_state') {
                        dropdownElement.value = "{{ old('billing_state') }}";
                        dropdownElement.dispatchEvent(new Event('change'));
                    }
                    @endif
                })
                .catch(error => {
                    console.error('Error fetching states:', error);
                    hideLoading(dropdownElement);
                });
        }
        
        // Function to fetch cities from API
        function fetchCities(country, state, dropdownElement) {
            showLoading(dropdownElement);
            fetch(`{{ route('api.location.cities') }}?country=${country}&state=${state}`)
                .then(response => response.json())
                .then(data => {
                    populateDropdown(dropdownElement, data);
                    hideLoading(dropdownElement);
                    
                    // If there's old input, try to select it
                    @if(old('city'))
                    if (dropdownElement.id === 'city') {
                        dropdownElement.value = "{{ old('city') }}";
                    }
                    @endif
                    
                    @if(old('billing_city'))
                    if (dropdownElement.id === 'billing_city') {
                        dropdownElement.value = "{{ old('billing_city') }}";
                    }
                    @endif
                })
                .catch(error => {
                    console.error('Error fetching cities:', error);
                    hideLoading(dropdownElement);
                });
        }
        
        // Function to populate a dropdown with options
        function populateDropdown(dropdownElement, data) {
            // Keep the first option (placeholder)
            const firstOption = dropdownElement.options[0];
            dropdownElement.innerHTML = '';
            dropdownElement.appendChild(firstOption);
            
            // Add new options
            data.forEach(item => {
                const option = document.createElement('option');
                option.value = item.id;
                option.textContent = item.name;
                dropdownElement.appendChild(option);
            });
        }
        
        // Function to reset a dropdown
        function resetDropdown(dropdownElement, placeholderText) {
            dropdownElement.innerHTML = `<option value="">${placeholderText}</option>`;
        }
        
        // Loading indicator functions
        function showLoading(element) {
            element.classList.add('opacity-50');
            element.classList.add('cursor-wait');
        }
        
        function hideLoading(element) {
            element.classList.remove('opacity-50');
            element.classList.remove('cursor-wait');
        }
    });
</script>
@endpush 