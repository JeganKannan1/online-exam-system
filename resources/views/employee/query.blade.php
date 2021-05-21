@extends('layouts.user')
@toastr_css
<div class="page-wrapper">
    <div class="content container col-md-8">
        <h2>If you would like to take re-test please fill the below form.</h2>
        <form action="{{route('user-query')}}" method="POST">
            @csrf
            <input type="hidden" name = "user_id" value="{{$id}}" >
            <input type="hidden" name = "team_id" value="{{$teamId}}" >
            <div class="form-group">
                <div class="form-group col-md-6">
                    <label>Select Test to retake</label>
                    <select class="form-control" name="test_id">
                      @foreach ($testName as $name)
                        <option value="{{ $name->id }}">{{ $name->Test->test_title }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Enter your query</label>
                    <textarea class="form-control" id="text" name="query" rows="4" cols="50"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-success pull-right Target" type="submit">Submit</button>
                </div>
            </div>
        </form>
        
    </div>
    
@jquery
    @toastr_js
    @toastr_render