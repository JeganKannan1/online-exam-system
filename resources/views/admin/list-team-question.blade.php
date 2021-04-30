@extends('layouts.app')
<div class="page-wrapper">
		<div class="content container-fluid">
    <div class="page-header">
          <div class="row">
            <div class="col">
    <div class="card-header">
      Teams
    </div>
    @foreach ($getTeam as $team)
        <ul class="list-group list-group-flush">
            <a href="/display-questions/{{$team->id}}"><li class="list-group-item">{{$team->team_name}}</li></a>
        </ul>
    @endforeach
    
  </div>
  </div>
  </div>
  </div>
  </div>