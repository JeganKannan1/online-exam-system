@extends('layouts.app')
@toastr_css
  <div class="page-wrapper">
		<div class="content container-fluid">
      
       
        @if (count($errors) > 0)
          <div class = "alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
        <div class="page-header">
          <div class="row">
            <div class="col">
      <form action="{{route('create-user')}}" method = "POST">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputEmail4">Employee Name</label>
            <input type="name" class="form-control" id="username" placeholder="Enter the Employee Name" name="username" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter the Password" name="password" value = "sparkout" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Name</label>
              <input type="name" class="form-control" id="name" placeholder="Enter the name" name="name" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter the email" name="email" required>
          </div>
            
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputAddress">Phone Number</label>
            <input type="text" class="form-control" id="PhoneNumber" placeholder="Enter the Phone Number" name="phone" required>
          </div>
          <div class="form-group col-md-6">
              <label for="inputAddress">Select Team</label>
              <select class="form-control" name="team_id">
                @foreach ($teamname as $team)
                  <option value="{{ $team->id }}">{{ $team->team_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Select Role</label>
            <select class="form-control" name="role_id">
              @foreach ($rolename as $role)
                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
              @endforeach
            </select>
          </div>
          </div>
        
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
                @if(isset($getUsers))
        <table id="example1" class="table table-bordered table-hover">
          <thead>
          <tr class="text-center">
            <th class="text-center">S.No</th>
            <th class="text-center">Employee Name</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Team</th>
            <th class="text-center">Role</th>
            <th class="text-center">Action</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getUsers as $getUser)
              <tr class="text-center">
              <td class="text-center">{{ $loop->index+1 }}</td>
              <td class="text-center">{{ $getUser->username }}</td>
              <td class="text-center">{{ $getUser->phone }}</td>
              <td class="text-center">{{ $getUser->Team->team_name }}</td>
              <td class="text-center">{{ $getUser->Role->role_name }}</td>


              <td class="text-center">
                <a href="{{route('edit-user', $getUser->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-right:20px;">Edit</a>
                <a href="{{route('delete-user', $getUser->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-left:20px;">delete</a>
              </td>
            </tr>  
            @endforeach
          
        </tbody>
        </table>
        @else
          <h3>No Data Found</h3>
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
</body>
</html>