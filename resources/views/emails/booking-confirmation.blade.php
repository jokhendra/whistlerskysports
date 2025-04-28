@component('mail::message')
# Booking Confirmation

Dear {{ $booking->name }},

Thank you for booking with Whistler Sky Sports! Your booking has been confirmed.

## Booking Details

**Package:** {{ ucfirst($booking->package) }}  
**Date:** {{ $booking->preferred_dates->format('F j, Y') }}  
**Sunrise Flight:** {{ $booking->sunrise_flight === 'yes' ? 'Yes' : 'No' }}

## Selected Add-ons
@if($booking->video_package)
- Video Package
@endif
@if($booking->deluxe_package)
- Deluxe Package
@endif
@if($booking->merch_package > 0)
- Merchandise Package ({{ $booking->merch_package }} items)
@endif

## Contact Information
**Email:** {{ $booking->email }}  
**Primary Phone:** {{ $booking->primary_phone }}  
**Local Contact:** {{ $booking->local_phone }}  
**Time Zone:** {{ $booking->timezone }}

## Participant Details
{{ $booking->flyer_details }}

@if($booking->underage_flyers)
**Underage Participants:**
{{ $booking->underage_flyers }}
@endif

## Additional Information
@if($booking->accommodation)
**Accommodation:** {{ $booking->accommodation }}
@endif

@if($booking->special_event)
**Special Event:** {{ $booking->special_event }}
@endif

@if($booking->additional_info)
**Additional Notes:** {{ $booking->additional_info }}
@endif

## Payment Information
**Total Amount:** CAD {{ number_format($booking->total_amount, 2) }}  
**Payment Status:** Paid  
**Transaction ID:** {{ $booking->payment_id }}

@component('mail::button', ['url' => config('app.url')])
Visit Our Website
@endcomponent

If you have any questions or need to make changes to your booking, please don't hesitate to contact us.

Thanks,<br>
{{ config('app.name') }}
@endcomponent 