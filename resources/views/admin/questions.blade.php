@extends('layouts.user')
@toastr_css
    <!-- Button trigger modal -->
	<div class = "container-fluid">
		<div class = "col-md-6" style="margin: 100px 220px">
			@foreach ($getTeam as $key=>$question)
			<div class="stepwizard">
				<div class="stepwizard-row setup-panel">
					<div class="stepwizard-step col-xs-3"> 
					
						<a href="#" type="button" class="btn btn-success btn-circle">1</a>
					</div>
				</div>
			</div>
			<form action="{{route('check-answer')}}" method = "POST">
				@csrf
        
		<div class="panel panel-primary setup-content" id="step-1">
			<div class="panel-body">
				<div class="form-group">
					<input type="hidden" class="form-control" id="team_id" aria-describedby="emailHelp" name="team_id" value={{$question->team_id}}>
				  </div>
				  <div class="form-group">
					<input type="hidden" class="form-control" id="role_id" aria-describedby="emailHelp" name="role_id" value={{$question->role_id}}>
				  </div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Questions</label>
          <p>{{$question->question}}</p>
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Options</label><br>
				  <input type="checkbox" id="vehicle1" name="option1" value="{{$question->option1}}">
				  <label for="vehicle1"> {{$question->option1}}</label><br>
				  <input type="checkbox" id="vehicle2" name="option2" value="{{$question->option2}}">
				  <label for="vehicle2"> {{$question->option2}}</label><br>
				  <input type="checkbox" id="vehicle3" name="option3" value="{{$question->option3}}">
				  <label for="vehicle3"> {{$question->option3}}</label><br>
				  <input type="checkbox" id="vehicle3" name="option4" value="{{$question->option4}}">
				  <label for="vehicle3"> {{$question->option4}}</label><br>
				  
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</div>
				@endforeach
			</form>
		{{-- </div> --}}
		
	</div>
</div>
	  {{-- </div>
	</div>
  </div>
   --}}
    
		@jquery
@toastr_js
@toastr_render
</body>
</html>