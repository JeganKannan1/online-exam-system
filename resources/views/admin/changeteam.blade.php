@extends('layouts.app')


<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
      <form action="{{route('update-team')}}" method = "POST">
        @csrf
        <div class="form-group">
            <input type="hidden" value="{{$editTeams->id}}" name="id">
            <div class="form-group">
        
        <div class="form-group">
          <label>update team</label>
          <input type="text" class="form-control" id="team" name = "team_name" value="{{ $editTeams->team_name}}">
        </div>
        <button type="submit" class="btn btn-primary">update</button>
      </form>
    </div>
</div>
{{-- <script src="assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Slimscroll JS -->
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		
		<!-- Chart JS -->
		<script src="assets/plugins/morris/morris.min.js"></script>
		<script src="assets/plugins/raphael/raphael.min.js"></script>
		<script src="assets/js/chart.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>  --}}
