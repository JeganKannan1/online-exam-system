@extends('layouts.app')


<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
      <form action="{{route('update-user')}}" method = "POST">
        @csrf
        <div class="form-group">
          <input type="hidden" value="{{$editUsers->id}}" name="id">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">UserName</label>
          <input type="name" class="form-control" id="username" placeholder="Enter the Username" name="username" value="{{$editUsers->username}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Name</label>
          <input type="name" class="form-control" id="name" placeholder="Enter the name" name="name" value="{{$editUsers->name}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Enter the email" name="email" value="{{$editUsers->email}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Phone Number</label>
          <input type="text" class="form-control" id="PhoneNumber" placeholder="Enter the Phone Number" name="phone" value="{{$editUsers->phone}}">
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Select Team</label>
          <select class="form-control" name="team_id">
            <option value="{{$editUsers->team_id}}">{{ $editUsers->team_id }}</option>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label for="inputAddress">Select Role</label>
          <select class="form-control" name="role_id">
            <option value="{{ $editUsers->role_id }}">{{$editUsers->role_id}}</option>
          </select>
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
</body>
</html>