@component('mail::message')
{{-- Subject: Your Booking Confirmation with Whistler Sky Sports --}}

Dear {{ $booking->name }},

Thank you for choosing Whistler Sky Sports! We are thrilled to confirm that your full payment has been received, and we're excited to welcome you for your flight lesson, tentatively scheduled for {{ $booking->preferred_dates->format('F j, Y') }}.

You'll receive a final confirmation of the flight status 48 hours prior to your scheduled time.

We're dedicated to ensuring your flying experience is truly unforgettable and a cherished memory for years to come. Should we fall short of this commitment, we're pleased to offer a full refund. For any questions, please visit the contact page on our website. We look forward to soaring with you soon!

---

**Booking Details**  
**Package**: {{ ucfirst($booking->package) }} Flight  
**Date**: {{ $booking->preferred_dates->format('F j, Y') }}  
**Sunrise Flight**: {{ $booking->sunrise_flight === 'yes' ? 'Yes' : 'No' }}  

**Selected Add-ons**  
@if($booking->video_package)
- Video Package  
@endif
@if($booking->deluxe_package)
- Deluxe Package  
@endif
@if($booking->merch_package > 0)
- Merchandise Package ({{ $booking->merch_package }} item{{ $booking->merch_package > 1 ? 's' : '' }})  
@endif
@if(!$booking->video_package && !$booking->deluxe_package && $booking->merch_package == 0)
_None selected_  
@endif

**Contact Information**  
**Email**: {{ $booking->email }}  
**Primary Phone**: {{ $booking->primary_phone }}  
**Local Contact**: {{ $booking->local_phone }}  
**Time Zone**: {{ $booking->timezone }}  

**Participant Details**  
@if($booking->flyer_details)
{{ $booking->flyer_details }}  
@else
None provided  
@endif

@if($booking->underage_flyers)
**Underage Participants:**
{{ $booking->underage_flyers }}
@endif

@if($booking->accommodation)
**Accommodation:** {{ $booking->accommodation }}
@endif
@if($booking->special_event)
**Special Event:** {{ $booking->special_event }}
@endif
@if($booking->additional_info)
**Additional Notes:** {{ $booking->additional_info }}
@endif

---

**Payment Information**  
**Total Amount:** CAD {{ number_format($booking->total_amount, 2) }}  
**Payment Status:** Paid  
@if($booking->payment_id)
**Transaction ID:** {{ $booking->payment_id }}  
@endif

@component('mail::button', ['url' => config('app.url')])
Visit Our Website
@endcomponent

---

Please don't hesitate to contact us if you have any questions or need further assistance. Thank you for your booking, and we can't wait to share this incredible adventure with you!

Warmest regards,  
The Whistler Sky Sports Team
@endcomponent 