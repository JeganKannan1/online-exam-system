@extends('layouts.app')
@toastr_css
    <!-- Button trigger modal -->
	<div class="page-wrapper">
		<div class="content container-fluid">
			@if (count($errors) > 0)
			   <ul>
				  @foreach ($errors->all() as $error)
			   <?php toastr()->error($error);?>
				  @endforeach
			   </ul>
		 	@endif
			<form action="{{route('set-question')}}" method="POST" class="myForm">
				@csrf
				<div class="form-group">
					<label>Enter test title</label>
					<input type="text" class="form-control" name="test_name" placeholder="Enter test title" >
				</div>
				<div class="form-group">
					<input type="hidden" class="form-control" id="team_id" aria-describedby="emailHelp" name="team_id" value="{{$team_id}}" required>
				  </div>
				  <div class="form-group">
					<input type="hidden" class="form-control" id="role_id" aria-describedby="emailHelp" name="role_id" value="{{$getTeam->role_id}}" required>
				  </div>
				<div class="form-group">
				  <label for="exampleInputEmail1">1.Questions</label>
				  <input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="users[0][question]" >
				</div>
				<div class="form-group">
					<label>Options</label><br>
				</div>


                <div class="form-group">
				    <div class="form-group">
                        <label for="Option A">
						    <input type="text" class="form-control" id="option1" placeholder="Option A" name="users[0][option1]" required />
                        </label>
						<label for="Option B">
						    <input type="text" class="form-control" id="option2" placeholder="Option B"name="users[0][option2]" required />
                        </label>
						<label for="Option C"> 
						    <input type="text" class="form-control" id="option3" placeholder="Option C" name="users[0][option3]" required />
						</label>
						<label for="Option D">
						    <input type="text" class="form-control" id="option4" placeholder="Option D" name="users[0][option4]" required />
						</label>
					</div>

                    <div class="form-group">
					    <label for="exampleInputPassword1">Answer</label>
				    </div> 

					<div class="form-group row">
					    <div class="col-md-3">
						    <input type="radio" id="name1activaitor" class="radio0" onclick="if(this.checked){ document.getElementById('option1').focus();}" name="users[0][check]" value="a" />A
						</div>
						<div class="col-md-3">
						    <input type="radio" id="name2activaitor" class="radio0" onclick="if(this.checked){ document.getElementById('option2').focus();}" name="users[0][check]" value="b" />B
						</div>	
						<div class="col-md-3">
						    <input type="radio" id="name3activaitor"class="radio0" onclick="if(this.checked){ document.getElementById('option3').focus();}" name="users[0][check]" value="c" />C
						</div>
						<div class="col-md-3">
						    <input type="radio" id="name4activaitor"class="radio0" onclick="if(this.checked){ document.getElementById('option4').focus();}" name="users[0][check]" value="d" />D
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
<script src="{{asset('assets/js/createquestion.js')}}"></script>
</body>
</html>