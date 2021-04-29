<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    @toastr_css
    <div class = "col-md-6" style="margin: 100px 220px">
        <form action="{{route('update-password')}}" method = "POST">
            @csrf
            <div class="form-group">
                    <input type="hidden" class="form-control" id="id" name = "id" value = '{{$editUsers->id}}'>
            </div>
            <div class="form-group">
                <label>Create new password</label>
                    <input type="password" class="form-control" id="password" name = "password">
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                    <input type="password" class="form-control" id="password1" name = "password1">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    @jquery
@toastr_js
@toastr_render
</body>
</html>