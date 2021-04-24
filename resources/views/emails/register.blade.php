@component('mail::message')
# Welcome {{$userDetails['username']}} !

Thank you for Registering.This is your Login Credentials to the Sparkout Portal

<h5>User Name : {{$userDetails['username']}}</h5>
<h5>Password : {{$userDetails['password']}}</h5>

@component('mail::button', ['url' => '{{url('/')}}/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
