@component('mail::message')
# {{ $details['title'] }}
  
Your new password is {{$details->password}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent