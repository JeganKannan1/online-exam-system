@extends('layouts.app')
<div class="card" style="margin: 100px 220px">
    <div class="card-header">
      Teams
    </div>
    @foreach ($getTeam as $team)
        <ul class="list-group list-group-flush">
            <a href="/display-questions/{{$team->id}}"><li class="list-group-item">{{$team->team_name}}</li></a>
        </ul>
    @endforeach
    
  </div>