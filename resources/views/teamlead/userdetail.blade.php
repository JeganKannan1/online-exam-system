@extends('layouts.app')
<div class="page-wrapper">
		<div class="content container-fluid">
    <div class="row">
	    <div class="col-lg-12">
		    <div class="card">
			    <div class="card-header">
      Teams
      </div>

    @foreach ($getTeam as $team)
        <ul class="list-group list-group-flush">
            <a href="/user-score/{{$team->id}}"><li class="list-group-item">{{$team->username}}</li></a>
        </ul>  
        @endforeach
  
</div>
</div>
</div>
</div>
</div>