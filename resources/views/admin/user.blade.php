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
            <label for="inputEmail4">UserName</label>
            <input type="name" class="form-control" id="username" placeholder="Enter the Username" name="username">
          </div>
          <div class="form-group col-md-6">
              <label for="inputPassword4">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Enter the Password" name="password" value = "sparkout">
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Name</label>
              <input type="name" class="form-control" id="name" placeholder="Enter the name" name="name">
          </div>
          <div class="form-group col-md-6">
              <label for="inputEmail4">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter the email" name="email">
          </div>
            
        </div>
          <div class="form-group col-md-6">
            <label for="inputAddress">Phone Number</label>
            <input type="text" class="form-control" id="PhoneNumber" placeholder="Enter the Phone Number" name="phone">
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
            <th class="text-center">Id</th>
            <th class="text-center">UserName</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Team</th>
            <th class="text-center">Role</th>
            <th class="text-center">Action</th>
            <th class="text-center">Action1</th>
          </tr>
          </thead>
          <tbody>
            @foreach ($getUsers as $getUser)
              <tr class="text-center">
              <td class="text-center">{{ $getUser->id }}</td>
              <td class="text-center">{{ $getUser->username }}</td>
              <td class="text-center">{{ $getUser->phone }}</td>
              <td class="text-center">{{ $getUser->team_id }}</td>
              <td class="text-center">{{ $getUser->role_id }}</td>


              <td class="text-center">
                <a href="{{route('edit-user', $getUser->id)}}" class="btn btn-sm btn-outline-danger py-0">Edit</a>
              </td>
                <td class="text-center">
                <a href="{{route('delete-user', $getUser->id)}}" class="btn btn-sm btn-outline-danger py-0">delete</a>
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
</body>
</html>