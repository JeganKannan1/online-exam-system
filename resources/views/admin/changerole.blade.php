@extends('layouts.app')

<div class = "container-fluid">
    <div class = "col-md-6" style="margin: 100px 220px">
        <form action="{{route('update-role')}}" method = "POST">
            @csrf
            <div class="form-group">
                <input type="hidden" value="{{$editRoles->id}}" name="id">
            </div>
            <div class="form-group">
                <label>update role</label>
                <input type="text" class="form-control" id="team" name = "role_name" value="{{ $editRoles->role_name}}">
            </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>

</body>
</html>