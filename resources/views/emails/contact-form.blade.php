@component('mail::message')
# New Contact Form Submission

You have received a new contact form submission from the WhistlerSkySports website.

**From:** {{ $name }}  
**Email:** {{ $email }}  
**Phone:** {{ $phone ?? 'Not provided' }}  
**Subject:** {{ $subject }}

**Message:**  
{{ $message }}

@component('mail::button', ['url' => config('app.url')])
Visit Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent 