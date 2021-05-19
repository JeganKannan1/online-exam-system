@extends('layouts.app')
@toastr_css


<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
      @if (count($errors) > 0)
			   <ul>
				  @foreach ($errors->all() as $error)
			   <?php toastr()->error($error);?>
				  @endforeach
			   </ul>
		 	@endif
      <form action="{{route('rewrite-question')}}" method = "POST">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{$editTeams->team_id}}" name="team_id">
            <input type="hidden" value="{{$editTeams->id}}" name="id">
          <label>Question</label>
          <input type="text" class="form-control" id="question" name = "question" value="{{ $editTeams->question}}" required>
          <label>option1</label>
          <input type="text" class="form-control" id="option1" name = "option1" value="{{ $editTeams->option1}}" required>
          <label>option2</label>
          <input type="text" class="form-control" id="option2" name = "option2" value="{{ $editTeams->option2}}" required>
          <label>option3</label>
          <input type="text" class="form-control" id="option3" name = "option3" value="{{ $editTeams->option3}}" required>
          <label>option4</label>
          <input type="text" class="form-control" id="option4" name = "option4" value="{{ $editTeams->option4}}" required>
          <label>answer</label>
          <select name="answer" id="answer" class="form-control">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
          </select>           </div>
        <button type="submit" class="btn btn-primary">update</button>
      </form>
    </div>
</div>
@jquery
    @toastr_js
    @toastr_render
</body>
</html>
