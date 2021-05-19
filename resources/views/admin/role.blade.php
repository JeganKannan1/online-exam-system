@extends('layouts.app')

@toastr_css

<div class="page-wrapper">
		<div class="content container-fluid">
      
     
            
            @if (count($errors) > 0)
			   <ul>
				  @foreach ($errors->all() as $error)
			   <?php toastr()->error($error);?>
				  @endforeach
			   </ul>
		 	@endif
            <div class="page-header">
				<div class="row">
					<div class="col">
        <form action="{{route('add-role')}}" method = "POST">
            @csrf
            <div class="form-group">
                <label>Create New Role</label>
                <input type="text" class="form-control" id="role" name = "role_name" placeholder="Enter The Role" required>
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
        @if(isset($getRoles))
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">S.no</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($getRoles as $getRole)
                        <tr class="text-center">
                            <td class="text-center">{{ $loop->index+1 }}</td>
                            <td class="text-center">{{ $getRole->role_name }}</td>
                            <td class="text-center">
                            <a href="{{route('edit-role', $getRole->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-right:20px;">Edit</a>
                            <a href="{{route('delete-role', $getRole->id)}}" class="btn btn-sm btn-outline-danger py-0" style="margin-left:20px;">delete</a>
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
@jquery
@toastr_js
@toastr_render
</body>
</html>