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
        <form action="{{route('update-role')}}" method = "POST">
            @csrf
            <div class="form-group">
                <input type="hidden" value="{{$editRoles->id}}" name="id" required>
            </div>
            <div class="form-group">
                <label>Update Role</label>
                <input type="text" class="form-control" id="team" name = "role_name" value="{{ $editRoles->role_name}}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
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