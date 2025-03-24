@component('mail::message')
# Hello {{ $name }}!

{{ $content }}

@component('mail::button', ['url' => config('app.url')])
Book Your Adventure Now
@endcomponent

Thanks for being a valued customer!<br>
{{ config('app.name') }}

<small>If you no longer wish to receive promotional emails, please click here to unsubscribe.</small>
@endcomponent 