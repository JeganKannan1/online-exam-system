@extends('layouts.user')
<div class="page-wrapper">
    <div class="content container col-md-8">
        <img src="{{asset('assets/img/thankyou.png')}}" class="img-fluid">
        <div class="col-md-9" style="margin: 20px 200px">
<p class="h2">Your score is {{$user->score}}/{{$user->total}}</p>
<p class="h3">Skipped question is {{$user->skiped}}</p>
        </div>
    </div>
</div>