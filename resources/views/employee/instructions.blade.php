@extends('layouts.user')
@toastr_css

<div class="page-wrapper">
    <div class="content container col-md-8">
        <form action="take-test" method="POST">
            @csrf
            <div class="form-group">
                <div class="form-group col-md-6">
                    <label>Select Test</label>
                    <select class="form-control" name="test_name">
                      @foreach ($testName as $name)
                        <option value="{{ $name->id }}">{{ $name->test_title }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <button class="btn btn-success pull-right Target" formtarget="_blank" type="submit">Submit</button>
                </div>
            </div>
        </form>
        
    </div>
    <div class="col-md-6">
        <h2>Instructions</h2>
        <li>Test should be conducted as per time</li>
        </div>
</div>
@jquery
    @toastr_js
    @toastr_render