@extends('layouts.dashboard')
<div class="card" style="margin: 100px 220px">
    <div class="card-header">
      Team Members
    </div>
    @foreach ($editTeamate as $teamate)
        <ul class="list-group list-group-flush">
            <a href="/user-report/{{$teamate->id}}"><li class="list-group-item">{{$teamate->username}}</li></a>
        </ul>
    @endforeach
    
  </div>