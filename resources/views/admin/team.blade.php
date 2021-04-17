@extends('layouts.app')

    <div class = "container-fluid">
      <div class = "col-md-6" style="margin: 100px 220px">
      <form action="{{route('create-team')}}" method = "POST">
        @csrf
        
        <div class="form-group">
          <label>create new team</label>
          <input type="text" class="form-control" id="team" name = "team_name">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
      <div class = "col-md-8" style="margin: 100px 220px">

@if(isset($getTeams))
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">Id</th>
           <th class="text-center">Name</th>
           <th class="text-center">Action</th>
           <th class="text-center">Action1</th>
        </tr>
        </thead>
       <tbody>
        
          @foreach ($getTeams as $getTeam)
            <tr class="text-center">
            <td class="text-center">{{ $getTeam->id }}</td>
            <td class="text-center">{{ $getTeam->team_name }}</td>

            <td class="text-center">
              <a href="{{route('edit', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0">Edit</a>
            </td>
              <td class="text-center">
              <a href="{{route('delete', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0">delete</a>
            </td>
           </tr>  
          @endforeach
         
       </tbody>
      </table>
    @endif
      </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
		
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
,</body>
</html>

