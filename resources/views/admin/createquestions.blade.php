@extends('layouts.dashboard')
@toastr_css
    <!-- Button trigger modal -->
	<div class="page-wrapper">
		<div class="content container-fluid">
			
			<form action="{{route('add-question')}}" method="POST" class="myForm">
				@csrf
				<div class="form-group">
					<label>Enter test title</label>
					<input type="text" class="form-control" name="test_name" placeholder="Enter test title">
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control" id="team_id" aria-describedby="emailHelp" name="team_id" value="{{$getTeam->team_id}}">
				  </div>
				  <div class="form-group">
					<input type="hidden" class="form-control" id="role_id" aria-describedby="emailHelp" name="role_id" value="{{$getTeam->role_id}}">
				  </div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Questions</label>
				  <input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="users[0][question]">
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Options</label>
				  <input type="text" class="form-control" id="option1" placeholder="option1" name="users[0][option1]">
				  <input type="text" class="form-control" id="option2" placeholder="option2"name="users[0][option2]">
				  <input type="text" class="form-control" id="option3" placeholder="option3" name="users[0][option3]">
				  <input type="text" class="form-control" id="option4" placeholder="option4" name="users[0][option4]">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Answer</label>
					<input type="text" class="form-control" id="answer" placeholder="answer" name="users[0][answer]">
				  </div>
				
			<div id="popup"></div>
			<div class="col-md-6">
				<button class="btn btn-info" type ="button" id="popup1">ADD</button>
		  </div>
		  <div class="col-md-6">
			<button type="submit" class="btn btn-primary" id="clickMe">Submit</button>
	  		</div>
		
		</form>

		</div>
	</div>
	@jquery
@toastr_js
@toastr_render
<script>
	var count = 0;
	console.log(count);
	$('#popup1').click(function() {
		count++;
		$('#popup').append('<div class="form-group"><label for="exampleInputEmail1">Questions</label><input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="users[' + count + '][question]"></div><div class="form-group"><label for="exampleInputPassword1">Options</label><input type="text" class="form-control" id="option1" placeholder="option1" name="users[' + count + '][option1]"><input type="text" class="form-control" id="option2" placeholder="option2"name="users[' + count + '][option2]"><input type="text" class="form-control" id="option3" placeholder="option3" name="users[' + count + '][option3]"><input type="text" class="form-control" id="option4" placeholder="option4" name="users[' + count + '][option4]"></div><div class="form-group"><label for="exampleInputPassword1">Answer</label><input type="text" class="form-control" id="answer" placeholder="answer" name="users[' + count + '][answer]"></div>');
	});
	
	</script>
</body>
</html>