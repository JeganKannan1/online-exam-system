@extends('layouts.dashboard')
<div class="page-wrapper">
		<div class="content container-fluid">
    <div class="text-center">  
    <h3>Teams</h3>
</div>
  <div class="row row-teams">
  @foreach($editTeamate as $teamate)
  

<div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
<a href="/user-report/{{$teamate->id}}">
<div class="card dash-widget">
  <div class="card-body">
    <div class="text-center">
      <h4>{{$teamate->username}}</h4>
    </div>
    
  </div>
</div>

</div>
</a>
@endforeach
</div>
</div>
</div>

