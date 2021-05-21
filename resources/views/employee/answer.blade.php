@extends('layouts.user')
<div class="page-wrapper">
			
    <!-- Page Content -->
    <div class="content container-fluid">
            <img src="{{asset('assets/img/thankyou.png')}}" class="img-fluid">
                <div class="col-md-9" style="margin: 20px 200px">
                    <p class="h2">Your score is {{$user->score}}/{{$user->total}}</p>
                    <p class="h3">You Skipped {{$user->skiped}} question.</p>
                </div>
    </div>
</div>

 