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
					<label>Options</label><br>
				</div>
				<div class="form-group">
					<label for="option1">
						<input type="radio" id="name1activaitor" class="radio0" onclick="if(this.checked){ document.getElementById('option1').focus();}" name="users[0][check]" value="a"/>A
					</label>
			  		<input type="text" class="form-control" id="option1" placeholder="option1" name="users[0][option1]" />
				</div>
				<div class="form-group">
				    <label for="option2">
						<input type="radio" id="name2activaitor" class="radio0" onclick="if(this.checked){ document.getElementById('option2').focus();}" name="users[0][check]" value="b"/>B
				  	</label>
				  	<input type="text" class="form-control" id="option2" placeholder="option2"name="users[0][option2]" />
				</div>
				<div class="form-group">
				  	<label for="option3">
						<input type="radio" id="name3activaitor"class="radio0" onclick="if(this.checked){ document.getElementById('option3').focus();}" name="users[0][check]" value="c"/>C
				  	</label>
				  	<input type="text" class="form-control" id="option3" placeholder="option3" name="users[0][option3]" />
				</div>
				<div class="form-group">
				  	<label for="option4">
						<input type="radio" id="name4activaitor"class="radio0" onclick="if(this.checked){ document.getElementById('option4').focus();}" name="users[0][check]" value="d"/>D
				  	</label>
				  	<input type="text" class="form-control" id="option4" placeholder="option4" name="users[0][option4]" />
				</div>
				{{-- <div class="form-group">
					<label for="exampleInputPassword1">Answer</label>
					<input type="text" class="form-control" id="answer" placeholder="answer" name="users[0][answer]">
				</div> --}}
				
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

	// var options = $('input[type="radio"]:checked').val();
	// $('#answer').click(function() {
	// console.log(options);
	// });
	var count = 0;
	$(".radio"+count).change(function()
        {
			console.log(count);
        $(".radio"+count).prop('checked',false);
	    $(this).prop('checked',true);
       });
	console.log(count);
	
		var option1 = document.getElementById('option1').focus();
		var option2 = document.getElementById('option2').focus();
		var option3 = document.getElementById('option3').focus();
		var option4 = document.getElementById('option4').focus();
		$('#popup1').click(function() {
			count++;
			console.log(count);
		
		$('#popup').append('<div class="form-group"><label for="exampleInputEmail1">Questions</label><input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="users[' + count + '][question]"></div><div class="form-group"><label>Options</label><br></div><div class="form-group"><label for="option1"><input type="radio" id="name1activaitor" class="radio'+count+'" onclick="if(this.checked)'+option1+'" name="users['+count+'][check]" value="a"/>A</label><input type="text" class="form-control" id="option1" placeholder="option1" name="users[' + count + '][option1]" /></div><div class="form-group"><label for="option2"><input type="radio" id="name2activaitor" class="radio'+count+'" onclick="if(this.checked)'+option2+'" name="users['+count+'][check]" value="b"/>B</label><input type="text" class="form-control" id="option2" placeholder="option2"name="users[' + count + '][option2]" /></div><div class="form-group"><label for="option3"><input type="radio" id="name3activaitor" class="radio'+count+'" onclick="if(this.checked)'+option3+'" name="users['+count+'][check]" value="c"/>C</label><input type="text" class="form-control" id="option3" placeholder="option3" name="users[' + count + '][option3]" /></div><div class="form-group"><label for="option4"><input type="radio" id="name4activaitor" class="radio'+count+'" onclick="if(this.checked)'+option4+'" name="users['+count+'][check]" value="d"/>D</label><input type="text" class="form-control" id="option4" placeholder="option4" name="users[' + count + '][option4]" /></div>');
		$(".radio"+count).change(function()
        {
			console.log(count);
        	$(".radio"+count).prop('checked',false);
	    	$(this).prop('checked',true);
       	});
	});
	
	</script>
</body>
</html>