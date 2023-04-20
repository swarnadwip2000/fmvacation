@component('mail::message')

Hi {{ $enquiry->name }},
<br>
Your enquiry has been {{ $enquiry->status }} by admin. 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
