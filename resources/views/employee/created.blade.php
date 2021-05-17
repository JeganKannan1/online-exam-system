@extends('layouts.dashboard')
<div class="page-wrapper">
		<div class="content container-fluid">
      <div class="text-center">  
        <h3>Test Titles</h3>
      </div>
      <div class="row row-teams">
        @foreach($testTitle as $title)
          <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
              <a href="/test-report/{{$title->id}}">
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
    </div>
  </div>
  
