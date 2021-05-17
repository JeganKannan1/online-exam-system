<html>
	<head>
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  


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
    <form action="{{route('check-answer')}}" method="POST" id = "myForm">
		@foreach ($testName as $question)
		@csrf
        <div class="card" id="step-{{$loop->index+1}}">
            
            <div class="card-header">
                <h3 class="card-title">{{$loop->index+1}}.{{$question->question}}</h3>
            </div>
            <div class="card-body">
               
                <div class="form-group">
                    <input type="hidden" value="{{($loop->count)}}" name="id">
                    <input type="hidden" value="{{($question->role_id)}}" name="role_id">
                    <input type="hidden" value="{{($question->test_name)}}" name="test_title">
                    <input type="hidden" value="{{($question->id)}}" name="question_id">
                    <div class="row">
                    <div class="form-check col-md-6">
                    <input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="a">
                    <label class="form-check-label">{{$question->option1}}</label>
                    </div>
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="b">
					<label class="form-check-label"> {{$question->option2}}</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="c">
					<label class="form-check-label"> {{$question->option3}}</label>
                    </div>
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="d">
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
            document.addEventListener("visibilitychange", function() {
            if (document.visibilityState === 'visible') {
            } else {
                // document.getElementById("myForm").submit();
            }
            });

            var time = 300;
        callsetTimeOut();  
        
        function callsetTimeOut(){
          setTimeout(function(){
          if(time){
          time--;
          var min = Math.floor(time/60),sec= Math.round(time%60);
           document.getElementById("timer").innerHTML =min +":" + sec + " min left";
           callsetTimeOut();
           
           if(time<=0){
               console.log('mudinchuchu');
            document.getElementById("myForm").submit();
           
           }
          }min +"Min Left"
          }, 1000);
        }
        </script>

		@jquery
@toastr_js
@toastr_render
</body>
</html>
