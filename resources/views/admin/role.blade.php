@extends('layouts.app')

@toastr_css

<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
        <div class="container">
            @if (count($errors) > 0)
               <div class = "alert alert-danger">
                  <ul>
                     @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                     @endforeach
                  </ul>
               </div>
            @endif
            </div>
        <form action="{{route('add-role')}}" method = "POST">
            @csrf
            <div class="form-group">
                <label>create new role</label>
                <input type="text" class="form-control" id="role" name = "role_name">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <div class = "col-md-8" style="margin: 100px 220px">
        @if(isset($getRoles))
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
                    @foreach ($getRoles as $getRole)
                        <tr class="text-center">
                            <td class="text-center">{{ $getRole->id }}</td>
                            <td class="text-center">{{ $getRole->role_name }}</td>
                            <td class="text-center">
                            <a href="{{route('edit-role', $getRole->id)}}" class="btn btn-sm btn-outline-danger py-0">Edit</a>
                            </td>
                            <td class="text-center">
                            <a href="{{route('delete-role', $getRole->id)}}" class="btn btn-sm btn-outline-danger py-0">delete</a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    </div>
</div>
@jquery
@toastr_js
@toastr_render
</body>
</html>