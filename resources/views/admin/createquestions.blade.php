@extends('layouts.user')
@toastr_css
    <!-- Button trigger modal -->
	<div class = "container-fluid">
		<div class = "col-md-6" style="margin: 100px 220px">
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Create Questions
  </button>
		</div>
	</div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  <h5 class="modal-title" id="exampleModalLabel">Question</h5>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<div class="modal-body">
			<form action="{{route('add-question')}}" method = "POST">
				@csrf
				<div class="form-group">
					<input type="hidden" class="form-control" id="team_id" aria-describedby="emailHelp" name="team_id" value="{{$getTeam->team_id}}">
				  </div>
				  <div class="form-group">
					<input type="hidden" class="form-control" id="role_id" aria-describedby="emailHelp" name="role_id" value="{{$getTeam->role_id}}">
				  </div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Questions</label>
				  <input type="text" class="form-control" id="question" aria-describedby="emailHelp" placeholder="Enter question" name="question">
				</div>
				<div class="form-group">
				  <label for="exampleInputPassword1">Options</label>
				  <input type="text" class="form-control" id="option1" placeholder="option1" name="option1">
				  <input type="text" class="form-control" id="option2" placeholder="option2"name="option2">
				  <input type="text" class="form-control" id="option3" placeholder="option3" name="option3">
				  <input type="text" class="form-control" id="option4" placeholder="option4" name="option4">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Answer</label>
					<input type="text" class="form-control" id="answer" placeholder="answer" name="answer">
				  </div>
				  
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		  <button type="button" class="btn btn-primary">Save changes</button>
		</div>
	  </div>
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
		<script src="assets/js/app.js"></script> --}}
		@jquery
@toastr_js
@toastr_render
</body>
</html>