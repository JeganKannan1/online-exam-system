@component('mail::message')
#
  
Reason: {{ $details['query'] }}
Please click the below button to re-assign the test.
@component('mail::button', ['url' => ("http://127.0.0.1:8000/show-query")])
Re-Assign Test
@endcomponent
   
Thanks,<br>
{{ config('app.name') }}
@endcomponent