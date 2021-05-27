<html>
	<head>
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  


	</head>
	<body>
        <div id = "saw"></div>
@toastr_css
        <div class="page-wrapper">
            <div id="timer" class="row justify-content-center border rounded-pill bg-success"></div>

            <div class="content container col-md-8">

                @if (count($errors) > 0)
                <ul>
                   @foreach ($errors->all() as $error)
                <?php toastr()->error($error);?>
                   @endforeach
                </ul>
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
                    <input type="hidden" value="{{($loop->count)}}" name="id" required>
                    <input type="hidden" value="{{($question->role_id)}}" name="role_id" required>
                    <input type="hidden" value="{{($question->test_name)}}" name="test_title" required>
                    <input type="hidden" value="{{($question->id)}}" name="name[{{$loop->index+1}}][question]" >
                    <div class="row">
                    <div class="form-check col-md-6">
                    <input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][answer]" value="a" >
                    <label class="form-check-label">{{$question->option1}}</label>
                    </div>
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][answer]" value="b" >
					<label class="form-check-label"> {{$question->option2}}</label>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][answer]" value="c" >
					<label class="form-check-label"> {{$question->option3}}</label>
                    </div>
                    <div class="form-check col-md-6">
					<input type="radio" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][answer]" value="d" >
					<label class="form-check-label"> {{$question->option4}}</label>
                    </div>
                </div>
                </div>

				@if ($loop->index == ($loop->count)-1 )
				<button class="btn btn-success pull-right"  type="submit">Finish!</button>
				@endif

				
            </div>
        </div>

		@endforeach
    </form>
            </div>
        </div>
        <div class="modal" tabindex="-1" role="dialog" id="ss">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Save changes</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
    <script src="{{asset('assets/js/answer.js')}}"></script>
		@jquery
@toastr_js
@toastr_render
</body>
</html>
