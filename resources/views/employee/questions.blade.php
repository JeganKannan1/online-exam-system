@extends('layouts.user')
<html>
	<head>
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
	</head>
	<body>
<div class="container col-md-6" style="margin:220px">
    <div class="container">
        @if (count($errors) > 0)
           <div class = "alert alert-danger">
              <ul>
                 @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
              </ul>
           </div>
        @endif
        </div>

    <div class="stepwizard">

        <div class="stepwizard-row setup-panel">
			@foreach ($getTeam as $question)
            <div class="stepwizard-step col-xs-1">

                <a href="#step-{{$loop->index+1}}" type="button" class="btn btn-success btn-circle">{{$loop->index+1}}</a>

            </div>
			@endforeach
        </div>

    </div>

    <form action="{{route('check-answer')}}" method="POST">
		@foreach ($getTeam as $question)
		@csrf
        <div class="panel panel-primary setup-content" id="step-{{$loop->index+1}}">
            <div class="panel-heading">
                 <h3 class="panel-title">{{$question->question}}</h3>
            </div>
            <div class="panel-body">
               
                <div class="form-group">
                    <input type="hidden" value="{{($loop->count)}}" name="id">
                    <input type="hidden" value="{{($question->role_id)}}" name="role_id">
                    <label for="vehicle{{$loop->index+1}}">
					<input type="checkbox" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option1}}">{{$question->option1}}</label><br>
					<input type="checkbox" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option2}}">
					<label for="vehicle{{$loop->index+1}}"> {{$question->option2}}</label><br>
					<input type="checkbox" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option3}}">
					<label for="vehicle{{$loop->index+1}}"> {{$question->option3}}</label><br>
					<input type="checkbox" id="vehicle{{$loop->index+1}}" class="radio"  name="name[{{$loop->index+1}}][]" value="{{$question->option4}}">
					<label for="vehicle{{$loop->index+1}}"> {{$question->option4}}</label><br>
                </div>

				@if ($loop->index == ($loop->count)-1 )
				<button class="btn btn-success pull-right" type="submit">Finish!</button>
				@else

                <button class="btn btn-primary nextBtn pull-right" id="{{$loop->index+1}}" type="button">Next</button>
				@endif
            </div>
        </div>

		@endforeach
    </form>

</div>
<script>
	$(document).ready(function () {

var navListItems = $('div.setup-panel div a'),
	allWells = $('.setup-content')
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
            curInputs = curStep.find("input[type='checkbox'],input[type='url']"),
            isValid = true;
console.log(nextStepWizard)
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

$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>

		@jquery
@toastr_js
@toastr_render
</body>
</html>
