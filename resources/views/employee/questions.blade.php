@extends('layouts.user')
<html>
	<head>
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	</head>
	<body>
        <div class="page-wrapper">
            <div id="timer" class="row justify-content-center border rounded-pill bg-success"></div>

            <div class="content container col-md-8">

        @if (count($errors) > 0)
           <div class = "alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
              </ul>
           </div>
        @endif
    <form action="{{route('check-answer')}}" method="POST">
		@foreach ($getTeam as $question)
		@csrf
        <div class="card" id="step-{{$loop->index+1}}">
            
            <div class="card-header">
                <h3 class="card-title">{{$loop->index+1}}.{{$question->question}}</h3>
            </div>
            <div class="card-body">
               
                <div class="form-group">
                    <input type="hidden" value="{{($loop->count)}}" name="id">
                    <input type="hidden" value="{{($question->role_id)}}" name="role_id">
                    <div class="row">
                    <div class="form-check col-md-6">
                    <input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option1}}">
                    <label class="form-check-label">{{$question->option1}}</label>
                    </div>
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option2}}">
					<label class="form-check-label"> {{$question->option2}}</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option3}}">
					<label class="form-check-label"> {{$question->option3}}</label>
                    </div>
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option4}}">
					<label class="form-check-label"> {{$question->option4}}</label>
                    </div>
                </div>
                </div>

				@if ($loop->index == ($loop->count)-1 )
				<button class="btn btn-success pull-right" type="submit">Finish!</button>
				@endif

				
            </div>
        </div>

		@endforeach
    </form>
            </div>
        </div>
        <script>
            var time = 600;
        callsetTimeOut();  
        
        function callsetTimeOut(){
          setTimeout(function(){
          if(time){
          time--;
          var min = Math.floor(time/60),sec= Math.round(time%60);
           document.getElementById("timer").innerHTML =min +":" + sec + " min left";
           callsetTimeOut();
          }min +"Min Left"
          }, 1000);
        }
        </script>

		@jquery
@toastr_js
@toastr_render
</body>
</html>
