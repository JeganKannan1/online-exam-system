@extends('layouts.app')
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
					<input type="hidden" class="form-control" id="team_id" aria-describedby="emailHelp" name="team_id" value="{{$team_id}}">
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
				    <div class="form-group">
                        <lable for="Option A">
						    <input type="text" class="form-control" id="option1" placeholder="Option A" name="users[0][Option1]" />
                        </label>
						<lable for="Option B">
						    <input type="text" class="form-control" id="option2" placeholder="Option B"name="users[0][Option2]" />
                        </lable>
						<lable for="Option C"> 
						    <input type="text" class="form-control" id="option3" placeholder="Option C" name="users[0][Option3]" />
						</lable>
						<lable for="Option D">
						    <input type="text" class="form-control" id="option4" placeholder="Option D" name="users[0][Option4]" />
						</lable>
					</div>

                    <div class="form-group">
					    <label for="exampleInputPassword1">Answer</label>
				    </div> 

					<div class="form-group row">
					    <div class="col-md-3">
						    <input type="radio" id="name1activaitor" class="radio0" onclick="if(this.checked){ document.getElementById('option1').focus();}" name="users[0][check]" value="a"/>A
						</div>
						<div class="col-md-3">
						    <input type="radio" id="name2activaitor" class="radio0" onclick="if(this.checked){ document.getElementById('option2').focus();}" name="users[0][check]" value="b"/>B
						</div>	
						<div class="col-md-3">
						    <input type="radio" id="name3activaitor"class="radio0" onclick="if(this.checked){ document.getElementById('option3').focus();}" name="users[0][check]" value="c"/>C
						</div>
						<div class="col-md-3">
						    <input type="radio" id="name4activaitor"class="radio0" onclick="if(this.checked){ document.getElementById('option4').focus();}" name="users[0][check]" value="d"/>D
						</div>
					</div>
                    
				


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
					
					$('#popup').append('<div id="remove' + count + '"><div class="form-group"><label for="exampleInputEmail1">Questions</label><input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="users[' + count + '][question]"></div><div class="form-group"><label>Options</label><br></div><div class="form-group"> <div class="form-group"><lable for="Option A"><input type="text" class="form-control" id="option1" placeholder="Option A" name="users[' + count + '][Option1]" /></label><lable for="Option B"><input type="text" class="form-control" id="option2" placeholder="Option B"name="users[' + count + '][Option2]" /></lable><lable for="Option C"><input type="text" class="form-control" id="option3" placeholder="Option C" name="users[' + count + '][Option3]" /></lable><lable for="Option D"><input type="text" class="form-control" id="option4" placeholder="Option D" name="users[' + count + '][Option4]" /></lable></div> <div class="form-group"><label for="exampleInputPassword1">Answer</label></div><div class="form-group row"><div class="col-md-3"><input type="radio" id="name1activaitor" class="radio'+count+'" onclick="if(this.checked)'+option1+'" name="users['+count+'][check]" value="a"/>A</div><div class="col-md-3"><input type="radio" id="name2activaitor" class="radio'+count+'" onclick="if(this.checked)'+option2+'" name="users['+count+'][check]" value="b"/>B</div><div class="col-md-3"><input type="radio" id="name3activaitor"class="radio'+count+'" onclick="if(this.checked)'+option3+'" name="users['+count+'][check]" value="c"/>C</div><div class="col-md-3"><input type="radio" id="name4activaitor"class="radio'+count+'" onclick="if(this.checked)'+option4+'" name="users['+count+'][check]" value="d"/>D</div></div></div><button onclick="myFunction()">Remove</button></div>');
					    function myFunction() {
						var myquestion = document.getElementById("remove"+count);
						myquestion.remove();
						}

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