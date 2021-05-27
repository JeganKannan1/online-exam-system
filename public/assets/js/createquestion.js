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
					
					$('#popup').append('<div id="remove' + count + '"><button class="remove btn btn-warning" style="float:right">Remove</button><div class="form-group"><label for="exampleInputEmail1">' + (count+1) + '.Questions</label><input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="users[' + count + '][question]" required></div><div class="form-group"><label>Options</label><br></div><div class="form-group"> <div class="form-group"><label for="Option A"><input type="text" class="form-control" id="option1" placeholder="Option A" name="users[' + count + '][option1]" required/></label><label for="Option B"><input type="text" class="form-control" id="option2" placeholder="Option B"name="users[' + count + '][option2]" required/></label><label for="Option C"><input type="text" class="form-control" id="option3" placeholder="Option C" name="users[' + count + '][option3]" required/></label><label for="Option D"><input type="text" class="form-control" id="option4" placeholder="Option D" name="users[' + count + '][option4]" required/></label></div> <div class="form-group"><label for="exampleInputPassword1">Answer</label></div><div class="form-group row"><div class="col-md-3"><input type="radio" id="name1activaitor" class="radio'+count+'" onclick="if(this.checked)'+option1+'" name="users['+count+'][check]" value="a" required/>A</div><div class="col-md-3"><input type="radio" id="name2activaitor" class="radio'+count+'" onclick="if(this.checked)'+option2+'" name="users['+count+'][check]" value="b" required/>B</div><div class="col-md-3"><input type="radio" id="name3activaitor"class="radio'+count+'" onclick="if(this.checked)'+option3+'" name="users['+count+'][check]" value="c" required/>C</div><div class="col-md-3"><input type="radio" id="name4activaitor"class="radio'+count+'" onclick="if(this.checked)'+option4+'" name="users['+count+'][check]" value="d" required/>D</div></div></div></div><div class="col-md-3"></div>');
					    

					$(".radio"+count).change(function()
					{
						console.log(count);
						$(".radio"+count).prop('checked',false);
						$(this).prop('checked',true);
					});
					$('#popup').on('click','.remove',function() {
						$(this).parent().remove();
					});
					
			});