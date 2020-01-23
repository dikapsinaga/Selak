@component('mail::message')
# Hello,
Thankyou for booking lapak in Selak.
Please confirm the lapak to make sure your attendance.
Click Yes to confirm and no to cancel your lapak.
@component('mail::button', ['url' => 'http://127.0.0.1:8000/invoice/', 'color' => 'green'])
Yes
@endcomponent

@component('mail::button', ['url' => 'http://127.0.0.1:8000/confirmation/'.$booklistId, 'color' => 'red'])
No
@endcomponent
Thanks,<br>
{{ config('app.name') }}
@endcomponent
