@extends('layouts.dashboard')


<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
      <form action="{{route('update-question')}}" method = "POST">
        @csrf
        <div class="form-group">
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
          <select name="answer" id="answer" class="form-control">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
          </select>   
        </div>
        <button type="submit" class="btn btn-primary">update</button>
      </form>
    </div>
</div>
