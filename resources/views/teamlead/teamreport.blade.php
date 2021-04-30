@extends('layouts.dashboard')
<div class="page-wrapper">
		<div class="content container-fluid">
<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
      Team Members
    </div>
    @foreach ($editTeamate as $teamate)
        <ul class="list-group list-group-flush">
            <a href="/user-report/{{$teamate->id}}"><li class="list-group-item">{{$teamate->username}}</li></a>
        </ul>
    @endforeach
    
  </div>
  </div>
  </div>
  </div>
  </div>

