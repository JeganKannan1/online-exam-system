@toastr_css
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
	body {
    margin-top:30px;
}
.stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:#bbb;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
}
</style>

<div class="container col-md-3" style="margin: 100px 400px">

    <div class="stepwizard">
		@foreach ($getTeam as $question) 
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step col-xs-1">
                <a href="#step-{{ $loop->index + 1 }}" type="button" class="btn btn-success btn-circle">{{ $loop->index + 1 }}</a>	
            </div>
        </div>
		@endforeach
    </div>
    
    <form role="form">
		
		@foreach ($getTeam as $question) 

        <div class="panel panel-primary setup-content" id="step-{{ $loop->index + 1 }}">
            <div class="panel-heading">
                 <h3 class="panel-title">Questions</h3>
            </div>
            <div class="panel-body">
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
					<button class="btn btn-primary nextBtn pull-right" type="button">Next</button>
				</div>
			</div>
					
        </div>
		@endforeach
    </form>
	
</div>
<script>
	$(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
	allWells = $('.setup-content'),
	allNextBtn = $('.nextBtn');

allWells.hide();

navListItems.click(function (e) {
	e.preventDefault();
	var $target = $($(this).attr('href')),
		$item = $(this);

	if (!$item.hasClass('disabled')) {
		navListItems.removeClass('btn-success').addClass('btn-default');
		$item.addClass('btn-success');
		allWells.hide();
		$target.show();
		$target.find('input:eq(0)').focus();
	}
});

allNextBtn.click(function () {
	var curStep = $(this).closest(".setup-content"),
		curStepBtn = curStep.attr("id"),
		nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
		curInputs = curStep.find("input[type='text'],input[type='url']"),
		isValid = true;

	$(".form-group").removeClass("has-error");
	for (var i = 0; i < curInputs.length; i++) {
		if (!curInputs[i].validity.valid) {
			isValid = false;
			$(curInputs[i]).closest(".form-group").addClass("has-error");
		}
	}

	if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-success').trigger('click');
});
</script>
    <!-- Button trigger modal -->
	{{-- <div class = "container-fluid">
		<div class = "col-md-6" style="margin: 100px 220px">
			@foreach ($getTeam as $question)
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
		
	    </div>
    </div> --}}
	  {{-- </div>
	</div>
  </div>
   --}}
    
		@jquery
@toastr_js
@toastr_render
</body>
</html>