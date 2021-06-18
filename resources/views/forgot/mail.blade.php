@component('mail::message')
# {{ $details['title'] }}
  
If you would like to reset your password.Click here
   
@component('mail::button', ['url' => ("http://127.0.0.1:8000/reset-password/".$details->id)])
click me!
@endcomponent
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent