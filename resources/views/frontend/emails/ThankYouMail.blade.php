@component('mail::message')

Hi {{ $booking->name }},
<br>
Thank you for booking with us. We will contact you soon.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
