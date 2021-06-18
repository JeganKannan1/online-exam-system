@extends('layouts.app')
<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="text-center">  
      <h3>Test Titles</h3>
    </div>
    <div class="row row-teams">
      @if(count($testTitle)>0)
      @foreach($testTitle as $title)
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
          <a href="/created-questions/{{$team_id}}/{{$title->id}}">
            <div class="card dash-widget">
              <div class="card-body">
                <div class="text-center">
                  <h4>{{$title->test_title}}</h4>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endforeach
    </div>
      @else
        <div class="col-md-12" >
          <div class="card dash-widget">
            <div class="card-body">
              <div class="text-center">
                <img src="{{asset('assets/img/no_data.jpg')}}">
                <h3>No Data Found</h3>
              </div>
            </div>
          </div>
        </div>
      @endif
  </div>
</div>