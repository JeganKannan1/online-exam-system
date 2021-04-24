@extends('layouts.user')
<div class="container col-md-6" style="margin:220px">

@if ($user->score)
<p>your score is {{$user->score}}/{{$user->total}}</p>
<p>skipped question is {{$user->skiped}}   
@endif
</div>