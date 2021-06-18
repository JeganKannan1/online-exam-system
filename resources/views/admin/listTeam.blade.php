@extends('layouts.app')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="text-center">
            <h3>Teams</h3>
        </div>
        @if (count($getTeam)>0)
        <div class="row row-teams">
            @foreach($getTeam as $team)
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <a href="/make-question/{{$team->id}}">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <div class="text-center">
                                    <h4>{{$team->team_name}}</h4>
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
