@extends('layouts.app')
@toastr_css
<div class="page-wrapper">
		<div class="content container-fluid">
      
     
            <div class="page-header">
						<div class="row">
							<div class="col">
      <form action="{{route('create-team')}}" method = "POST">
        @csrf
            <label>Create New Team</label>
          <input type="text" class="form-control" id="team" name = "team_name" placeholder="Enter The Team" required>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    
      </div>
      </div>


      <div class="row">
						<div class="col-lg-12">
							<div class="card">
								<div class="card-header">
@if(isset($getTeams))
      <table id="example1" class="table table-bordered table-hover">
        <thead>
        <tr class="text-center">
           <th class="text-center">S.no</th>
           <th class="text-center">Name</th>
           <th class="text-center">Action</th>
          </tr>
        </thead>
       <tbody>
        
          @foreach ($getTeams as $getTeam)
            <tr class="text-center">
            <td class="text-center">{{ $loop->index+1 }}</td>
            <td class="text-center">{{ $getTeam->team_name }}</td>

            <td class="text-center ">
              <a href="{{route('edit', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-right:20px;">Edit</a>
              <a href="{{route('delete', $getTeam->id)}}" class="btn btn-sm btn-outline-danger py-0 action-delete" style="margin-left:20px;">delete</a>
            </td>
           </tr>  
          @endforeach
         
       </tbody>
      </table>
    @endif
      </div>
    </div>
    </div>
    </div> 
    </div>
    </div>
  
    @jquery
    @toastr_js
    @toastr_render
		<!-- Custom JS -->
</body>
</html>

