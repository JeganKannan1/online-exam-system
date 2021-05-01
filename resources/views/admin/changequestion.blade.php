@extends('layouts.app')
@toastr_css


<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
      <form action="{{route('rewrite-question')}}" method = "POST">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{$editTeams->team_id}}" name="team_id">
            <input type="hidden" value="{{$editTeams->id}}" name="id">
          <label>Question</label>
          <input type="text" class="form-control" id="question" name = "question" value="{{ $editTeams->question}}">
          <label>option1</label>
          <input type="text" class="form-control" id="option1" name = "option1" value="{{ $editTeams->option1}}">
          <label>option2</label>
          <input type="text" class="form-control" id="option2" name = "option2" value="{{ $editTeams->option2}}">
          <label>option3</label>
          <input type="text" class="form-control" id="option3" name = "option3" value="{{ $editTeams->option3}}">
          <label>option4</label>
          <input type="text" class="form-control" id="option4" name = "option4" value="{{ $editTeams->option4}}">
          <label>answer</label>
          <input type="text" class="form-control" id="answer" name = "answer" value="{{ $editTeams->answer}}">
        </div>
        <button type="submit" class="btn btn-primary">update</button>
      </form>
    </div>
</div>
@jquery
    @toastr_js
    @toastr_render
</body>
</html>
